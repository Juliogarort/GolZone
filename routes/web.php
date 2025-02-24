<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\CartController;

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

// ✅ Autenticación con Fortify (Se eliminan rutas manuales)
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
// Route::middleware(['admin'])->group(function () {
//     Route::get('/admin', [ProductController::class, 'adminIndex'])->name('admin.index');
// });

// -------------------------------------------------------------------------------------------------------
Route::get('/admin', [ProductController::class, 'adminIndex'])->name('admin.index');



Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::get('/cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');











/* ---------------------------------------------- ANTES DEL FORTIFY ---------------------------------------------------------
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

*/