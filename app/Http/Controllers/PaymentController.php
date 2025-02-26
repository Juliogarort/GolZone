<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\ShoppingCart;
use App\Models\Order;
use App\Models\OrderDetail;

class PaymentController extends Controller
{
    public function checkout()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $cart = ShoppingCart::getUserCart();
        $cartItems = $cart->items()->with('product')->get();

        $lineItems = [];
        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $item->product->name,
                    ],
                    'unit_amount' => $item->price * 100,
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [$lineItems],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        $user = Auth::user();
        $cart = ShoppingCart::getUserCart();
        $cartItems = $cart->items()->with('product')->get();

        // Calcular el subtotal sin IVA
        $subtotal = $cartItems->sum(function ($item) {
            return ($item->price / 1.21) * $item->quantity;
        });

        // Registrar la compra en la base de datos
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $subtotal * 1.21, // Total con IVA
        ]);

        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Vaciar el carrito después de la compra
        $cart->items()->delete();

        return view('bill', compact('cartItems'));
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
