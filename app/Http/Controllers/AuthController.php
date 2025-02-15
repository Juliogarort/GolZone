<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest; // Si tienes un Request personalizado para login
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Mostrar el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de que tienes una vista 'auth.login'
    }

    /**
     * Manejar la autenticación del usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $credentials = $request->only('email', 'password');

        // Verificar si las credenciales son correctas
        if (Auth::attempt($credentials)) {
            // Regenerar la sesión para prevenir ataques de fijación de sesión
            $request->session()->regenerate();

            // Redirigir al usuario según su tipo
            $user = Auth::user();
            if ($user->user_type === 'Admin') {
                return redirect()->route('home');
            } elseif ($user->user_type === 'Customer') {
                return redirect()->route('home');
            }
        }

        // Si no se autenticó correctamente, redirigir de nuevo con un mensaje de error
        return Redirect::back()->withErrors(['email' => 'Las credenciales son incorrectas']);
    }

    /**
     * Manejar el cierre de sesión.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar sesión

        $request->session()->invalidate(); // Invalidar la sesión

        $request->session()->regenerateToken(); // Regenerar el token para prevenir CSRF

        return redirect('/'); // Redirigir al inicio
    }
}

