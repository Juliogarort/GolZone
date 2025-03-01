<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('type', ['simple', 'category', 'product']); // Tipo de descuento
            $table->decimal('discount_amount', 10, 2)->nullable(); // Descuento en cantidad fija
            $table->decimal('discount_percentage', 5, 2)->nullable(); // Descuento en porcentaje
            $table->unsignedBigInteger('category_id')->nullable(); // Descuento por categoría
            $table->unsignedBigInteger('product_id')->nullable(); // Descuento por producto
            $table->integer('usage_limit')->nullable(); // Número de veces que puede usarse
            $table->integer('used')->default(0); // Veces utilizadas
            $table->timestamp('expires_at')->nullable(); // Fecha de expiración
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('discounts');
    }
};
