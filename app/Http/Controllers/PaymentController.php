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

        // 🛒 Si el carrito está vacío, redirigir con error
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío.');
        }

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

        // 🔍 Buscar la orden más reciente del usuario
        $existingOrder = Order::where('user_id', $user->id)
            ->whereDate('created_at', now()->toDateString())
            ->latest()
            ->first();

        // ❌ Si ya existe una orden para esta compra, NO crear otra
        if (!$existingOrder) {
            $order = Order::create([
                'user_id' => $user->id,
                'total' => $cartItems->sum(fn($item) => $item->price * $item->quantity), // ✅ CORRECTO, sin volver a multiplicar por 1.21
            ]);

            foreach ($cartItems as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price * $item->quantity, // ✅ Multiplicamos el precio por la cantidad
                ]);
            }
            

            // ✅ Solo vaciar el carrito si se creó una nueva orden
            $cart->items()->delete();
        } else {
            // ✅ Si la orden ya existía, usémosla
            $order = $existingOrder;
        }

        // ✅ Obtener los productos de la orden (NO del carrito, que ya está vacío)
        $cartItems = OrderDetail::where('order_id', $order->id)->with('product')->get();

        // ✅ Pasar la orden y los productos a la vista `bill.blade.php`
        return view('bill', compact('cartItems', 'order'));
    }

    public function cancel()
    {
        return redirect()->route('cart.index')->with('error', 'El pago fue cancelado.');
    }
}
