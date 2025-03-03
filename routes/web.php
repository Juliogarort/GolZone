<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

// ✅ Página de bienvenida
Route::get('/', fn() => view('welcome'))->name('welcome');

// ✅ Páginas estáticas
Route::view('/contact', 'contact')->name('contact');
Route::view('/aboutUs', 'aboutUs')->name('aboutUs');

// ✅ Procesar formulario de contacto (Corrección de contact.submit)
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// ✅ Rutas de Productos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// ✅ Redirección según el rol del usuario
Route::get('/dashboard', function () {
    $user = Auth::user();
    return ($user && $user->email === 'admin@example.com') 
        ? redirect()->route('admin.index') 
        : redirect()->route('welcome');
})->middleware('auth');

// ✅ Panel de administración
Route::get('admin', [ProductController::class, 'adminIndex'])
    ->middleware(['auth'])
    ->name('admin.index');

// ✅ Autenticación con Fortify
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::get('/forgot-password', fn() => view('auth.passwords.email'))->name('password.request');
Route::get('/reset-password/{token}', fn($token) => view('auth.passwords.reset', ['token' => $token]))->name('password.reset');

// ✅ Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('welcome')->with('success', 'Has cerrado sesión correctamente.');
})->name('logout');

// ✅ Rutas de verificación de email con Fortify
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', fn() => view('auth.verify-email'))->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('welcome')->with('success', '¡Tu correo ha sido verificado!');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/resend', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Correo de verificación reenviado.');
    })->middleware('throttle:6,1')->name('verification.resend');
});

// ✅ Rutas protegidas para usuarios autenticados y verificados (excepto admin@example.com y usuario@example.com)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/cart/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
    Route::get('/cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');

    // 💳 Checkout y pago con Stripe
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/success', [PaymentController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', fn() => redirect()->route('cart.index')->with('warning', 'El pago fue cancelado.'))
        ->name('checkout.cancel');

    // 📄 Facturación
    Route::view('/bill', 'bill')->name('bill');
    Route::get('/factura/pdf', [InvoiceController::class, 'downloadPDF'])->name('factura.pdf');

    // 🛍 Wishlist (Lista de Deseos)
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle/{id}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

    // 👤 Perfil de Usuario
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ✅ Excepción: `admin@example.com` y `usuario@example.com` pueden acceder sin verificar email
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
});


// ✅ Aplicación de cupones de descuento
Route::post('/cart/apply-discount', [CartController::class, 'applyDiscount'])->name('cart.applyDiscount');
