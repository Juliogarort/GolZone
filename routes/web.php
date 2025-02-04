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


// Ruta para procesar el formulario de contacto
Route::post('/contact', function () {
    return redirect()->route('welcome');
})->name('contact.submit');

// Ruta nombrada para la página de bienvenida
Route::get('/welcome', function () {
    return view('welcome'); // Carga la vista 'welcome.blade.php'
})->name('welcome');