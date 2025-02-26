<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = ShoppingCart::getUserCart();
        $cartItems = $cart->items()->with('product')->get();
        return view('cart', compact('cartItems'));
    }

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

    public function remove($id)
    {
        $cart = ShoppingCart::getUserCart();
        ShoppingCartItem::where('cart_id', $cart->id)->where('product_id', $id)->delete();
        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
    }

    public function clear()
    {
        $cart = ShoppingCart::getUserCart();
        $cart->items()->delete();
        return redirect()->route('cart.index')->with('success', 'Carrito vaciado.');
    }

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

    public function checkout()
    {
        return redirect()->route('checkout');
    }
}
