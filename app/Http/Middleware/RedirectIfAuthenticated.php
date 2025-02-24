<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                
                if ($user->email === 'admin@example.com') {
                    return redirect()->route('admin.index'); // Redirigir a Admin
                }
                
                return redirect()->route('welcome'); // Redirigir a página normal
            }
        }

        return $next($request);
    }
}
