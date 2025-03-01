<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    $productos = Product::with('discount') // Carga la relación de descuento
        ->when($liga, function ($query, $liga) {
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



    public function adminIndex(Request $request)
    {
        // Obtener valores del formulario (si aplica filtros en la administración)
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
            ->paginate(10); // Paginación: 12 productos por página

        // Obtener opciones únicas para filtros
        $ligas = Product::select('liga')->distinct()->pluck('liga');
        $tipos = Product::select('type')->distinct()->pluck('type');

        return view('admin', compact('productos', 'ligas', 'tipos', 'liga', 'type', 'minPrice', 'maxPrice'));
    }

    // Función para eliminar producto
    public function destroy(Product $product)
    {
        try {
            // Si el producto tiene imagen, eliminarla
            if ($product->image) {
                Storage::disk('public')->delete('products/' . $product->image);
            }

            // Eliminar el producto
            $product->delete();

            // Redirigir con un mensaje de éxito
            return redirect()->route('admin.index')->with('success', 'Producto eliminado correctamente.');
        } catch (\Exception $e) {
            // Redirigir con un mensaje de error en caso de fallo
            return redirect()->route('admin.index')->with('error', 'Error al eliminar el producto.');
        }
    }

    // Función para modificar producto
    public function update(Request $request, Product $product)
{
    // Validar los datos recibidos
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'liga' => 'nullable|string|max:255',
        'type' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        // Si hay una nueva imagen, guardarla y actualizar
        if ($request->hasFile('image')) {
            // Eliminar la imagen antigua si existe
            if ($product->image) {
                // Eliminar la imagen antigua de la carpeta public/img
                unlink(public_path('img/' . $product->image));
            }

            // Obtener el nombre original de la nueva imagen
            $imageName = $request->file('image')->getClientOriginalName();
            
            // Mover la nueva imagen a la carpeta public/img
            $request->file('image')->move(public_path('img'), $imageName);
            
            // Guardar solo el nombre de la imagen en la base de datos
            $validated['image'] = $imageName;
        }

        // Actualizar el producto con los datos validados
        $product->update($validated);

        // Redirigir con éxito
        return redirect()->route('admin.index')->with('success', 'Producto actualizado correctamente.');
    } catch (\Exception $e) {
        // Redirigir con error
        return redirect()->route('admin.index')->with('error', 'Error al actualizar el producto.');
    }
}

    // Función para guardar un nuevo producto
    public function store(Request $request)
{
    // Validar los datos del formulario
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'liga' => 'nullable|string|max:255',
        'type' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        // Si se sube una imagen, guardarla y asociarla al producto
        if ($request->hasFile('image')) {
            // Obtener el nombre original de la imagen
            $imageName = $request->file('image')->getClientOriginalName();
            
            // Mover la imagen a la carpeta public/img
            $request->file('image')->move(public_path('img'), $imageName);
            
            // Guardar solo el nombre de la imagen en la base de datos
            $validated['image'] = $imageName;
        }

        // Crear un nuevo producto
        $product = Product::create($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.index')->with('success', 'Producto creado correctamente.');
    } catch (\Exception $e) {
        // Redirigir con un mensaje de error
        return redirect()->route('admin.index')->with('error', 'Error al crear el producto.');
    }
}
}
