<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Usuario Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin'),
                'user_type' => 'Admin',
                'email_verified_at' => Carbon::now(), // ✅ Marcar como verificado
            ]
        );

        // Usuario Regular
        User::updateOrCreate(
            ['email' => 'usuario@example.com'],
            [
                'name' => 'Usuario',
                'password' => Hash::make('usuario'),
                'user_type' => 'Customer',
                'email_verified_at' => Carbon::now(), // ✅ Marcar como verificado
            ]
        );
    }
}
