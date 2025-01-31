<?php

use Illuminate\Support\Facades\Route;

// Ruta para la página de bienvenida (landing page)
Route::get('/', function () {
    return view('welcome'); // Carga la vista 'welcome.blade.php'
});

// Ruta para la página de contacto
Route::get('/contact', function () {
    return view('contact'); // Carga la vista 'contact.blade.php'
});
