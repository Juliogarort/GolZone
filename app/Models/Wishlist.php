<?php

// App\Models\Wishlist.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'wishlist_products')->withTimestamps();
    }

    // Agrega esta función
    public static function getUserWishlist()
    {
        return self::firstOrCreate(['user_id' => Auth::id()]);
    }
}
