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
        // Si el producto tiene un descuento válido, calcularlo
        if ($this->discount) {
            if ($this->discount->discount_percentage) {
                return $this->price * (1 - ($this->discount->discount_percentage / 100));
            }
            if ($this->discount->discount_amount) {
                return max(0, $this->price - $this->discount->discount_amount);
            }
        }

        // Si no tiene descuento, retornar el precio original
        return $this->price;
    }
}
