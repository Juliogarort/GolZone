<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Muestra el contenido del carrito
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart', compact('cart'));
    }

    // Agregar un producto al carrito
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }

        Session::put('cart', $cart);

        // Devolver respuesta JSON para AJAX
        return response()->json(['success' => 'Producto añadido al carrito']);
    }

    // Eliminar un producto del carrito
    public function remove($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        Session::put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
    }

    // Vaciar el carrito
    public function clear()
    {
        Session::forget('cart');
        return redirect()->route('cart.index')->with('success', 'Carrito vaciado.');
    }

    // Aumentar cantidad de un producto en el carrito
    public function increaseQuantity($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    // Disminuir cantidad de un producto en el carrito
    public function decreaseQuantity($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id]) && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity'] -= 1;
        } else {
            unset($cart[$id]);
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }
}
