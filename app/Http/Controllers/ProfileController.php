<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class ProfileController extends Controller
{
    // Mostrar perfil del usuario
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Actualizar perfil del usuario
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Validación
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20|unique:users,phone,' . $user->id,
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
        ]);

        // Actualizar usuario
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        // Actualizar o crear dirección
        if ($user->address) {
            $user->address->update($data);
        } else {
            $address = Address::create($data);
            $user->address()->associate($address);
            $user->save();
        }

        return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
    }
}
