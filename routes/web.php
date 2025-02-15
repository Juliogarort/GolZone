<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Ruta para el envío del formulario de contacto
Route::post('/contact', function () {
    return redirect()->route('welcome');
})->name('contact.submit');

// Ruta para la página de inicio
Route::get('/welcome', [HomeController::class, 'index'])->name('home');

// Ruta para mostrar productos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Rutas para Admins protegidas por middleware de autenticación y rol 'is_admin'
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Aquí puedes agregar más rutas específicas para admin
});

// Rutas para Customers protegidas por middleware de autenticación y rol 'is_customer'
Route::middleware(['auth', 'is_customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
    // Aquí puedes agregar más rutas específicas para customer
});

// Rutas para la autenticación de usuario
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para el registro de usuario
Route::get('/signIn', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
