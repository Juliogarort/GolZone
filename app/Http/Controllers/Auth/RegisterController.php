<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Donde redirigir a los usuarios después del registro.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Crear una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Mostrar el formulario de registro.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Manejar el registro de un nuevo usuario.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario manualmente
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => false,  // Aseguramos que el usuario no sea admin por defecto
        ]);

        // Verificar si el usuario se creó correctamente
        if (!$user) {
            return redirect()->route('register')->with('error', 'No se pudo completar el registro.');
        }

        // Autenticar al usuario automáticamente después del registro
        Auth::login($user);

        // Verificar si Laravel autentica correctamente al usuario
        if (!Auth::check()) {
            return redirect()->route('register')->with('error', 'Error al autenticar el usuario.');
        }

        // Redirigir al usuario a la página de bienvenida con un mensaje de éxito
        return redirect()->route('welcome')->with('success', 'Registro exitoso. Bienvenido, ' . $user->name);
    }
}
