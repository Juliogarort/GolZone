<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // IMPORTANTE: Agregar Log

class RegisterController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20', 'unique:users,phone'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'user_type' => 'Customer',
        ]);
    }

    public function register(Request $request)
{
    // Validar los datos
    $validated = $this->validator($request->all());

    if ($validated->fails()) {
        return redirect()->back()
            ->withErrors($validated)
            ->withInput(); // Mantiene los datos en el formulario
    }

    // Crear usuario
    try {
        $user = $this->create($request->all());

        if (!$user) {
            return redirect()->back()->with('error', 'Error al registrar el usuario.');
        }

        // Iniciar sesión automáticamente
        Auth::login($user);

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'El usuario no pudo autenticarse.');
        }

        return redirect()->route('welcome')->with('success', 'Registro exitoso. Bienvenido, ' . $user->name);

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error en el registro: ' . $e->getMessage());
    }
}

}
