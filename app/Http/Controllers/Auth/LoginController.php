<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Mostrar el formulario de login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Manejar la autenticación del usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Verificar si el usuario existe
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'No existe una cuenta con este correo.'])->withInput();
        }

        // Intentar autenticar al usuario
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->withErrors(['password' => 'La contraseña ingresada es incorrecta.'])->withInput();
        }

        // Regenerar la sesión para prevenir ataques de fijación de sesión
        $request->session()->regenerate();

        // Redirigir al usuario según su tipo
        if ($user->user_type === 'Admin') {
            return redirect()->route('admin.index')->with('success', 'Inicio de sesión exitoso. Bienvenido, Admin.');
        }

        return redirect()->route('welcome')->with('success', 'Inicio de sesión exitoso. Bienvenido de nuevo, ' . $user->name);
    }

    /**
     * Cerrar sesión y redirigir al usuario.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome')->with('success', 'Has cerrado sesión correctamente.');
    }
}
