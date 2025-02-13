<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Ruta para la página de bienvenida (landing page)
Route::get('/', function () {
    return view('welcome'); // Carga la vista 'welcome.blade.php'
});

// Ruta para la página de contacto
Route::get('/contact', function () {
    return view('contact'); // Carga la vista 'contact.blade.php'
});

// Ruta para la página de productos
Route::get('/products', function () {
    return view('products'); // Carga la vista 'products.blade.php'
});

// Ruta para la página sobre nosotros
Route::get('/aboutUs', function () {
    return view('aboutUs'); // Carga la vista 'aboutUs.blade.php'
});

// Ruta para el formulario de inicio de sesión
Route::get('/signIn', function () {
    return view('signIn'); // Carga la vista 'signIn.blade.php'
});

// Procesar el formulario de inicio de sesión
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Otras rutas relacionadas con el contacto
Route::post('/contact', function () {
    return redirect()->route('welcome');
})->name('contact.submit');

// Rutas de autenticación (proporcionadas por Auth::routes)
Auth::routes();

// Ruta para la página de inicio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta para mostrar productos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

