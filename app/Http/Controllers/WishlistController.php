<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::firstOrCreate(['user_id' => Auth::id()]);
        $wishlistItems = $wishlist->products; // 👈 Aquí definimos claramente la variable

        return view('wishlist', compact('wishlistItems'));
    }


    public function toggle(Request $request, $id)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Debes iniciar sesión primero.'], 401);
        }

        // Obtienes o creas la wishlist correctamente
        $wishlist = Wishlist::firstOrCreate(['user_id' => $user->id]);

        if ($wishlist->products()->where('product_id', $id)->exists()) {
            $wishlist->products()->detach($id);
            return response()->json(['success' => 'Producto eliminado de tu lista de deseos', 'inWishlist' => false]);
        } else {
            $wishlist->products()->attach($id);
            return response()->json(['success' => 'Producto añadido a tu lista de deseos', 'inWishlist' => true]);
        }
    }


    public function remove($productId)
    {
        $wishlist = Wishlist::firstOrCreate(['user_id' => Auth::id()]);
        $wishlist->products()->detach($productId);

        return redirect()->route('wishlist.index')->with('success', 'Producto eliminado de tu lista de deseos.');
    }
}
