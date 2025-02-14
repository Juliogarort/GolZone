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
    $type = $request->input('type');
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    // Construir la consulta con filtros opcionales
    $productos = Product::when($liga, function ($query, $liga) {
        return $query->where('liga', $liga);
    })
    ->when($type, function ($query, $type) {
        return $query->where('type', $type);
    })
    ->when($minPrice, function ($query, $minPrice) {
        return $query->where('price', '>=', $minPrice);
    })
    ->when($maxPrice, function ($query, $maxPrice) {
        return $query->where('price', '<=', $maxPrice);
    })
    ->paginate(12); // Paginación: 12 productos por página

    // Obtener opciones únicas para filtros
    $ligas = Product::select('liga')->distinct()->pluck('liga');
    $tipos = Product::select('type')->distinct()->pluck('type');

    return view('products', compact('productos', 'ligas', 'tipos', 'liga', 'type', 'minPrice', 'maxPrice'));
}


}
