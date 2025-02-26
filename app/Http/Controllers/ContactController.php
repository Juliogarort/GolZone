<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^[0-9]{9}$/',
            'reason' => 'required|string',
            'message' => 'required|string|min:10|max:1000',
        ]);

        return redirect()->route('contact')->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}