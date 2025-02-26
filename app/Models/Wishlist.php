<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
    protected $fillable = ['user_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'wishlist_products')->withTimestamps();
    }

    public static function getUserWishlist()
    {
        return self::firstOrCreate(['user_id' => Auth::id()]);
    }
}
