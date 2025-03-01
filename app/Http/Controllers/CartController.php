<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use App\Models\Discount;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = ShoppingCart::getUserCart();
        $cartItems = $cart->items()->with('product')->get();
        return view('cart', compact('cartItems', 'cart'));
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
        $cart->update(['discount_code' => null, 'discount_value' => null]); // Limpiar descuento
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

    /**
     * Aplicar cupon de descuento
     */
    public function applyDiscount(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $cart = ShoppingCart::getUserCart();
        $discount = Discount::where('code', $request->code)
            ->where('expires_at', '>=', now())
            ->where(function ($query) {
                $query->whereNull('usage_limit')
                    ->orWhereColumn('used', '<', 'usage_limit');
            })
            ->first();

        if (!$discount) {
            return back()->with('error', 'El cupón no es válido o ha expirado.');
        }

        // Obtener los productos con sus categorías para aplicar correctamente los descuentos
        $cartItems = $cart->items()->with('product.category')->get();
        $totalDiscount = 0;

        foreach ($cartItems as $item) {
            $product = $item->product;

            if ($discount->type === 'product' && $product->id == $discount->product_id) {
                $discountValue = $discount->discount_amount ?? ($product->price * $discount->discount_percentage / 100);
                $item->update(['discount' => $discountValue]);
                $totalDiscount += $discountValue * $item->quantity;
            } elseif ($discount->type === 'category' && $product->category_id == $discount->category_id) {
                $discountValue = $discount->discount_amount ?? ($product->price * $discount->discount_percentage / 100);
                $item->update(['discount' => $discountValue]);
                $totalDiscount += $discountValue * $item->quantity;
            }
        }

        // 🔥 Aplicar descuentos globales (simple) sobre el subtotal
        if ($discount->type === 'simple') {
            $subtotal = $cartItems->sum(fn($item) => ($item->product->price - ($item->discount ?? 0)) * $item->quantity);
            $globalDiscountValue = $discount->discount_amount ?? ($subtotal * $discount->discount_percentage / 100);
            $totalDiscount += $globalDiscountValue; // Se suma al total
        }

        $cart->update(['discount_code' => $discount->code, 'discount_value' => $totalDiscount]);
        $discount->increment('used');

        return back()->with('success', 'Descuento aplicado correctamente.');
    }




    /**
     * Checkout con descuento aplicado
     */
    public function checkout()
    {
        $cart = ShoppingCart::getUserCart();
        $cartItems = $cart->items()->with('product')->get();
        $total = $cartItems->sum(fn($item) => ($item->product->price - ($item->discount ?? 0)) * $item->quantity);

        return view('checkout', compact('cartItems', 'total', 'cart'));
    }
}
