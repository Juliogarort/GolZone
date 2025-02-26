<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

// ✅ Ruta principal (Bienvenida o Inicio autenticado)
Route::get('/', function () {
    return view('welcome'); 
})->name('welcome');

Route::get('/welcome', function () {
    return view('welcome'); 
})->name('welcome');

// ✅ Páginas estáticas
Route::view('/contact', 'contact')->name('contact');
Route::view('/products', 'products')->name('products');
Route::view('/aboutUs', 'aboutUs')->name('aboutUs');
Route::view('/cart', 'cart')->name('cart');

// ✅ Rutas de Productos (CRUD)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// ✅ Ruta intermedia para redirigir según el rol del usuario
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user && $user->email === 'admin@example.com') {
        return redirect()->route('admin.index');
    }

    return redirect('/welcome');
})->middleware('auth');

// ✅ Ruta para la página de administración
Route::get('/admin', [ProductController::class, 'adminIndex'])
    ->name('admin.index')
    ->middleware(['auth', 'admin']);

// ✅ Autenticación con Fortify
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/forgot-password', fn() => view('auth.passwords.email'))->name('password.request');
Route::get('/reset-password/{token}', fn($token) => view('auth.passwords.reset', ['token' => $token]))->name('password.reset');

// ✅ Logout con Fortify
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('welcome')->with('success', 'Has cerrado sesión correctamente.');
})->name('logout');

// ✅ Rutas de Productos solo para usuarios autenticados
Route::get('/admin', [ProductController::class, 'adminIndex'])->name('admin.index');

// ✅ Rutas del Carrito de Compras (protegidas para usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear'); // 🆕 Vaciar carrito
    Route::get('/cart/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
    Route::get('/cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
    
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');

    // Nueva ruta para la factura
    Route::get('/bill', [CartController::class, 'checkout'])->name('cart.bill');
});

//PASARELA DE PAGO CON STRIPE
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/success', [PaymentController::class, 'success'])->name('checkout.success'); // ✅ Redirige a la factura
    Route::get('/checkout/cancel', function () {
        return redirect()->route('cart.index')->with('warning', 'El pago fue cancelado.');
    })->name('checkout.cancel');
    
});


//Ruta para poder descargar la factura
Route::get('/factura/pdf', [InvoiceController::class, 'downloadPDF'])->name('factura.pdf');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle/{id}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});




