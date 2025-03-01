<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'code', 'type', 'discount_amount', 'discount_percentage',
        'category_id', 'product_id', 'usage_limit', 'used', 'expires_at'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
