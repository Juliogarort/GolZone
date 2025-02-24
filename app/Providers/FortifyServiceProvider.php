<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse;
use App\Models\User;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 🔹 Registrar LoginResponse para personalizar la redirección después del login
        $this->app->singleton(LoginResponse::class, function () {
            return new class implements LoginResponse {
                public function toResponse($request)
                {
                    $user = Auth::user();

                    if ($user->email === 'admin@example.com') {
                        return redirect()->route('admin.index'); // Si es admin, lo manda al panel de admin
                    }

                    return redirect()->route('welcome'); // Usuario normal va a welcome
                }
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 🔹 Configurar Rate Limiter para evitar ataques de fuerza bruta
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email . $request->ip());
        });

        // 🔹 Configurar vistas personalizadas de Fortify
        Fortify::loginView(fn() => view('auth.login'));
        Fortify::registerView(fn() => view('auth.register'));
        Fortify::requestPasswordResetLinkView(fn() => view('auth.passwords.email'));
        Fortify::resetPasswordView(fn($request) => view('auth.passwords.reset', ['request' => $request]));

        // 🔹 Personalizar validación de login
        Fortify::authenticateUsing(function (Request $request) {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas no son correctas.'],
            ]);
        });
    }
}
