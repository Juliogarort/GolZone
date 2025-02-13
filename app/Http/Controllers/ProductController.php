<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Obtener valores del formulario
        $liga = $request->input('liga');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // Construir la consulta con filtros opcionales
        $productos = Product::when($liga, function ($query, $liga) {
            return $query->where('liga', $liga);
        })
        ->when($minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })
        ->when($maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })
        ->get();

        // Obtener las ligas únicas disponibles para el filtro
        $ligas = Product::select('liga')->distinct()->pluck('liga');

        return view('products', compact('productos', 'ligas', 'liga', 'minPrice', 'maxPrice'));
    }
}
