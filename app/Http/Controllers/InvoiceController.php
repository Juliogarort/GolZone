<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use App\Models\Order;
use App\Models\OrderDetail;

class InvoiceController extends Controller
{
    public function downloadPDF()
    {
        $user = Auth::user();
        $cart = ShoppingCart::getUserCart();
        $cartItems = $cart->items()->with('product')->get(); // Obtener productos de la base de datos

        // Calcular el subtotal (lo que va a aparecer en la factura)
        $subtotal = $cartItems->sum(function ($item) {
            return ($item->price / 1.21) * $item->quantity;
        });

        // Crear un nuevo pedido en la tabla 'orders'
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $subtotal, // Puedes agregar el IVA o cualquier otro cálculo
        ]);

        // Agregar los productos del carrito a la tabla 'order_details'
        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Preparar los datos para el PDF
        $data = [
            'user' => $user,
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'fecha' => now()->setTimezone('Europe/Madrid')->format('d/m/Y H:i')
        ];

        // Generar el PDF
        $pdf = Pdf::loadView('pdf', $data);

        // Vaciar el carrito después de registrar la compra
        $cart->items()->delete();

        // Descargar el PDF
        return $pdf->download('factura.pdf');
    }
}
