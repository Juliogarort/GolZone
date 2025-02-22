<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Mostrar la vista de administrador.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin'); // Ahora carga admin.blade.php correctamente
    }
}
