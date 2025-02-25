<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    // Relación con los items del carrito
    public function items()
    {
        return $this->hasMany(ShoppingCartItem::class, 'cart_id');
    }

    // Obtener o crear el carrito del usuario autenticado
    public static function getUserCart()
    {
        return self::firstOrCreate(['user_id' => Auth::id()]);
    }
}
