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
        User::updateOrCreate(
            ['email' => 'alejandrojesusluarca@gmail.com'], // 🔹 Campo para buscar el usuario
            [
                'name' => 'Ignacio Luarca',
                'password' => Hash::make('Luarca2105.'),
                'profession' => 'Desarrollador Web',
                'bio' => 'Analista Programador Computacional con sólida experiencia en el desarrollo de
                    soluciones tecnológicas. Formación sólida en análisis de sistemas y programación,
                    con enfoque en la calidad del código, la resolución eficiente de problemas y el
                    trabajo colaborativo. Especializado en el diseño e implementación de soluciones
                    funcionales, escalables y orientadas a las necesidades del usuario.',
                'photo' => null,
                'facebook' => 'https://facebook.com/ignacioluarca',
                'instagram' => 'https://www.instagram.com/ilv_innovation/',
                'twitter' => 'https://twitter.com/ignacioluarca',
                'linkedin' => 'https://linkedin.com/in/ignacio-luarca-varas-16a3821b9',
                'github' => 'https://github.com/nachoLuarca',
            ]
        );
    }
}
