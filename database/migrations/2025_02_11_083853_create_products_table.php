<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->decimal('price', 10, 2);
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->string('image')->nullable(); // Añadir columna para imagen
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('products');
    }
};
