<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'liga', 'category_id', 'image', 'description', 'type'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Accesor para obtener el precio con descuento
    public function discount()
    {
        return $this->hasOne(Discount::class, 'product_id');
    }

    // Método para calcular el precio con descuento
    public function getDiscountedPriceAttribute()
{
    $price = $this->price;
    
    // Si hay un descuento de producto, aplicarlo
    if ($this->discount) {
        if ($this->discount->discount_percentage) {
            $price = $price * (1 - ($this->discount->discount_percentage / 100));
        }
        if ($this->discount->discount_amount) {
            $price = max(0, $price - $this->discount->discount_amount);
        }
    }

    // Aplicar descuento por categoría si existe
    if ($this->category && $this->category->discount) {
        $categoryDiscount = $this->category->discount;
        if ($categoryDiscount->discount_percentage) {
            $price = $price * (1 - ($categoryDiscount->discount_percentage / 100));
        }
        if ($categoryDiscount->discount_amount) {
            $price = max(0, $price - $categoryDiscount->discount_amount);
        }
    }

    return $price;
}

}
