<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => Hash::make('12345678'),
            'profession' => 'Desarrollador Web',
            'bio' => 'Apasionado por la programación y el desarrollo de aplicaciones modernas.',
            'photo' => null, // puedes poner una ruta si tienes una imagen
        ]);
    }
}
