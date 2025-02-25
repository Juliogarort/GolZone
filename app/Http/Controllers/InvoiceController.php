<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;


class InvoiceController extends Controller
{
    public function downloadPDF()
    {
        $user = Auth::user();
        $cart = ShoppingCart::getUserCart();
        $cartItems = $cart->items()->with('product')->get(); // Obtener productos de la base de datos
    
        $subtotal = $cartItems->sum(function ($item) {
            return ($item->price / 1.21) * $item->quantity;
        });
    
        $data = [
            'user' => $user,
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'fecha' => now()->setTimezone('Europe/Madrid')->format('d/m/Y H:i')
        ];
    
        $pdf = Pdf::loadView('pdf', $data);
    
        $cart->items()->delete();  // Aquí vacías el carrito

        return $pdf->download('factura.pdf');
    }
    
}
