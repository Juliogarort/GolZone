<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Symfony\Component\HttpFoundation\Response;

class EnsureFrontendRequestsAreStateful
{
    public function handle(Request $request, \Closure $next)
    {
        if (config('fortify.guard') === 'web' && $request->is('api/*')) {

            return response()->json([
                'message' => 'Unauthenticated.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
