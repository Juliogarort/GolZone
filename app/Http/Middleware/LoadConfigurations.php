<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoadConfigurations
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cargar configuraciones personalizadas si es necesario
        // Ejemplo: config(['app.custom_config' => 'value']);
        
        return $next($request);
    }
}
