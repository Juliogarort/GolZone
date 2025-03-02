<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class NoVerifyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // ✅ Permitir el acceso sin verificar email solo a admin@example.com y usuario@example.com
        if ($user && in_array($user->email, ['admin@example.com', 'usuario@example.com'])) {
            return $next($request);
        }

        if (!$user || ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail())) {
        if (!$user || !$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice')->with('error', 'Debes verificar tu correo antes de acceder.');
        }

        return $next($request);
    }
}
}