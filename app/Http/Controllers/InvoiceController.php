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

        // 🔍 Obtener la orden más reciente del usuario
        $order = Order::where('user_id', $user->id)->latest()->first();

        // ❌ Si NO hay una orden, redirigir con error
        if (!$order) {
            return redirect()->route('cart.index')->with('error', 'No hay una orden registrada para generar la factura.');
        }

        // ✅ Obtener productos desde OrderDetail (NO desde el carrito)
        $cartItems = OrderDetail::where('order_id', $order->id)->with('product')->get();

        // 🔹 Calcular el subtotal usando el precio con descuento
        $subtotal = $cartItems->sum(fn($item) => $item->product->discounted_price * $item->quantity) / 1.21; // ✅ AHORA CON DESCUENTO

        // 🔹 Preparar datos para el PDF
        $data = [
            'user' => $user,
            'cartItems' => $cartItems,
            'subtotal' => $subtotal, // ✅ AHORA CON DESCUENTO
            'fecha' => $order->created_at->format('d/m/Y H:i'),
        ];

        // ✅ Generar el PDF
        $pdf = Pdf::loadView('pdf', $data);

        // 📄 Descargar el PDF
        return $pdf->download('factura.pdf');
    }
}
