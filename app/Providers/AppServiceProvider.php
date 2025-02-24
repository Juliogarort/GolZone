<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Laravel\Fortify\Fortify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Actions\Fortify\CreateNewUser; // 📌 Importar la clase para crear usuarios

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Activa los estilos de Bootstrap en la paginación
        Paginator::useBootstrap();

        /**
         * ✅ Registrar la lógica de creación de usuarios con Fortify
         */
        Fortify::createUsersUsing(CreateNewUser::class);

        /**
         * 🔵 Inicio de sesión personalizado con Fortify
         */
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas no son correctas.'],
            ]);
        });

        /**
         * 🔄 Vistas personalizadas de Fortify
         */
        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });
    }
}
