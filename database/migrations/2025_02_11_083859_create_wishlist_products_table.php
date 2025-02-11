<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('wishlist_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wishlist_id')->constrained('wishlists');
            $table->foreignId('product_id')->constrained('products');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('wishlist_products');
    }
};
