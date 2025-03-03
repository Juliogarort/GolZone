<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use App\Models\User;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 🔹 Personalizar la respuesta después del registro para forzar la verificación del email
        $this->app->singleton(RegisterResponse::class, function () {
            return new class implements RegisterResponse {
                public function toResponse($request)
                {
                    $user = Auth::user();

                    // 🔴 Si no es admin ni usuario@example.com, forzamos verificación
                    if (!in_array($user->email, ['admin@example.com', 'usuario@example.com'])) {
                        Auth::logout();
                        return redirect()->route('register')->with('success', '¡Registro exitoso! Revisa tu correo y verifica tu cuenta.');
                    }

                    // ✅ Si es admin o usuario@example.com, va directo a la bienvenida
                    return redirect()->route('welcome');
                }
            };
        });

        // 🔹 Personalizar la respuesta de login para bloquear a los usuarios no verificados
        $this->app->singleton(LoginResponse::class, function () {
            return new class implements LoginResponse {
                public function toResponse($request)
                {
                    $user = Auth::user();
        
                    // ✅ Si es admin, redirigirlo a la ruta correcta
                    if ($user->email === 'admin@example.com') {
                        return redirect()->route('admin.index'); // Asegúrate de que la ruta existe
                    }
        
                    // ✅ Si es usuario@example.com, redirigir a la página de bienvenida
                    if ($user->email === 'usuario@example.com') {
                        return redirect()->route('welcome');
                    }
        
                    // ❌ Si el usuario no ha verificado su email, lo bloqueamos y lo deslogueamos
                    if (!$user->hasVerifiedEmail()) {
                        Auth::logout();
                        return redirect()->route('verification.notice')->with('error', 'Debes verificar tu correo antes de continuar.');
                    }
        
                    // ✅ Si es un usuario normal, redirigir al dashboard o a la página principal
                    return redirect()->route('dashboard');
                }
            };
        });
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 🔹 Limitar intentos de inicio de sesión para evitar ataques de fuerza bruta
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email . $request->ip());
        });

        // 🔹 Configurar vistas personalizadas de Fortify
        Fortify::loginView(fn() => view('auth.login'));
        Fortify::registerView(fn() => view('auth.register'));
        Fortify::requestPasswordResetLinkView(fn() => view('auth.passwords.email'));
        Fortify::resetPasswordView(fn($request) => view('auth.passwords.reset', ['request' => $request]));
        Fortify::verifyEmailView(fn() => view('auth.verify-email'));

        // 🔹 Forzar la verificación después del registro
        Event::listen(Registered::class, function ($event) {
            if (!in_array($event->user->email, ['admin@example.com', 'usuario@example.com'])) {
                Auth::logout(); // 🔴 Cerrar sesión para obligar a la verificación
            }
        });

        // 🔹 Bloquear inicio de sesión si el usuario no ha verificado su correo, excepto admin/usuario@example.com
        Fortify::authenticateUsing(function ($request) {
            $user = User::where('email', $request->email)->first();

            if ($user && !in_array($user->email, ['admin@example.com', 'usuario@example.com']) && !$user->hasVerifiedEmail()) {
                return null; // ❌ Bloquear inicio de sesión hasta que el usuario verifique su email
            }

            return $user;
        });
    }
}
