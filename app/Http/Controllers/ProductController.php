<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Método para mostrar todos los productos
    public function index()
    {
        // Obtener todos los productos desde la base de datos
        $productos = Product::all(); // Cambiar $products por $productos

        // Pasar los productos a la vista 'products'
        return view('products', compact('productos')); // Cambiar 'products' por 'productos'
    }
}