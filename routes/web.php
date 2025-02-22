<?php

use App\Http\Controllers\ProductController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

// ✅ Ruta principal (Bienvenida o Inicio autenticado)
Route::get('/', function () {
    return view('welcome'); // Usa welcome para todos, cambiando el contenido según el estado de sesión
})->name('welcome');

// ✅ Páginas estáticas
Route::view('/contact', 'contact')->name('contact');
Route::view('/products', 'products')->name('products');
Route::view('/aboutUs', 'aboutUs')->name('aboutUs');
Route::view('/cart', 'cart')->name('cart');

// ✅ Ruta para la página de administración (con middleware de autenticación)
Route::get('/admin', [ProductController::class, 'adminIndex'])
    ->name('admin.index')
    ->middleware('auth');

// ✅ Rutas de Productos (CRUD)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// ✅ Rutas de Autenticación
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->remember)) {
        $user = Auth::user();
        
        if ($user->email === 'admin@example.com') {
            return redirect()->route('admin.index'); // Redirige a la vista de administración
        }

        return redirect()->route('welcome'); // Redirige a la vista principal autenticada
    }

    return redirect()->route('login')->withErrors(['email' => 'Las credenciales no son correctas.']);
})->name('login.post');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('welcome'); // Ahora redirige a la página principal en lugar de login
})->name('logout');

// ✅ Registro de Usuarios
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// ✅ Rutas de Productos solo para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::view('/productsLogged', 'productsLogged')->name('products.logged');
});
