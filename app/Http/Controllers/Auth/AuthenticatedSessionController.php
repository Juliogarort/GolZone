<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar la vista de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('auth.login');  // Asegúrate de tener la vista 'auth.login' creada
    }

    /**
     * Manejar la solicitud de autenticación.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar credenciales
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirigir según el tipo de usuario
            if ($user->email === 'admin@example.com') {
                return redirect()->route('admin.index');
            }

            return redirect()->route('welcome');
        }

        // Si las credenciales son incorrectas, devolver error
        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no son correctas.',
        ]);
    }

    /**
     * Destruir una sesión autenticada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Cerrar sesión
        Auth::guard('web')->logout();

        // Invalidar la sesión
        $request->session()->invalidate();

        // Regenerar el token de la sesión
        $request->session()->regenerateToken();

        // Redirigir a la página de inicio
        return redirect()->route('welcome');
    }
}
