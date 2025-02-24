<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return $next($request);
        }

        return redirect('/welcome'); // Redirige si no es admin
    }
}
