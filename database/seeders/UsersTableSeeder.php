<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Usuario Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'user_type' => 'Admin'
        ]);

        // Usuario Regular
        User::create([
            'name' => 'Usuario',
            'email' => 'usuario@example.com',
            'password' => Hash::make('usuario'),
            'user_type' => 'Customer'
        ]);
    }
}
