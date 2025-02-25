<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Muestra el contenido del carrito
    public function index()
    {
        $cart = ShoppingCart::getUserCart();
        $cartItems = $cart->items()->with('product')->get();

        return view('cart', compact('cartItems'));
    }

    // Agregar un producto al carrito
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = ShoppingCart::getUserCart();

        $cartItem = ShoppingCartItem::where('cart_id', $cart->id)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            ShoppingCartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $id,
                'quantity' => 1,
                'price' => $product->price
            ]);
        }

        return response()->json(['success' => 'Producto añadido al carrito']);
    }

    // Eliminar un producto del carrito
    public function remove($id)
    {
        $cart = ShoppingCart::getUserCart();
        ShoppingCartItem::where('cart_id', $cart->id)->where('product_id', $id)->delete();

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
    }

    // Vaciar el carrito
    public function clear()
    {
        $cart = ShoppingCart::getUserCart();
        $cart->items()->delete();

        return redirect()->route('cart.index')->with('success', 'Carrito vaciado.');
    }

    // Aumentar cantidad de un producto en el carrito
    public function increaseQuantity($id)
    {
        $cart = ShoppingCart::getUserCart();
        $cartItem = ShoppingCartItem::where('cart_id', $cart->id)->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        }

        return redirect()->route('cart.index');
    }

    // Disminuir cantidad de un producto en el carrito
    public function decreaseQuantity($id)
    {
        $cart = ShoppingCart::getUserCart();
        $cartItem = ShoppingCartItem::where('cart_id', $cart->id)->where('product_id', $id)->first();

        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }

        return redirect()->route('cart.index');
    }
}
