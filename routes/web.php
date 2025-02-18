<?php

use App\Http\Controllers\ProductController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

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

// Ruta para el home
Route::get('/home', function () {
    return view('home'); // Carga la vista 'home.blade.php'
})->name('home'); // Aseguramos que esta ruta tenga un nombre para redirección

// Ruta para el carrito
Route::get('/cart', function () {
    return view('cart'); // Carga la vista 'cart.blade.php'
});

// Ruta para el envío del formulario de contacto
Route::post('/contact', function () {
    return redirect()->route('welcome');
})->name('contact.submit');

// Ruta para la página de inicio
Route::get('/welcome', [HomeController::class, 'index'])->name('home');

// Ruta para mostrar productos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Ruta para los administradores (CORREGIDA)
Route::get('/admin', [ProductController::class, 'adminIndex'])
    ->name('admin.index')
    ->middleware('auth');

// Eliminar producto en la vista de admin
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Modificar producto en la vista de admin
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Agregar un producto
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Ruta de Login
Route::get('/login', function () {
    return view('auth.login'); // Muestra el formulario de login
})->name('login');

// Ruta para el login de usuario (CORREGIDA)
Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->remember)) {
        $user = Auth::user();
        
        if ($user->email === 'admin@example.com') {
            return redirect()->route('admin.index'); // Redirige a admin.index
        }

        return redirect()->route('home'); // Si es usuario normal, redirige al home
    }

    return redirect()->route('login')->withErrors(['email' => 'Las credenciales no son correctas.']);
});

// Ruta para el logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login'); // Redirige al login después de hacer logout
})->name('logout');

// Ruta para el registro de usuario
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Ruta para productos con sesión iniciada
Route::get('/productsLogged', function () {
    return view('productsLogged'); // Carga la vista 'productsLogged.blade.php'
});
