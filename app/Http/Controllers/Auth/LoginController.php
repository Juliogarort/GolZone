<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar la autenticación de login
    public function login(Request $request)
    {
        // Validación de las credenciales
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $user = Auth::user();
    
            // Redirigir según el tipo de usuario (admin o cliente)
            if ($user->is_admin) {
                return redirect()->route('home'); // Ruta del panel de administración
            }
    
            return redirect()->route('home'); // Ruta del home para usuarios normales
        }
    
        return redirect()->back()->with('error', 'Credenciales incorrectas');
    }
    

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
