<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Método para mostrar todos los productos
    public function index(Request $request)
{
    // Obtener la liga seleccionada desde el formulario (si existe)
    $liga = $request->input('liga');

    // Filtrar productos si se selecciona una liga
    $productos = Product::when($liga, function ($query, $liga) {
        return $query->where('liga', $liga);
    })->get();

    // Obtener las ligas únicas disponibles para el filtro
    $ligas = Product::select('liga')->distinct()->pluck('liga');

    // Pasar los productos, ligas y la liga seleccionada a la vista
    return view('products', compact('productos', 'ligas', 'liga'));
}


}