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
            'name' => 'Ignacio Luarca',
            'email' => 'alejandrojesusluarca@gmail.com',
            'password' => Hash::make('Luarca2105.'),
            'profession' => 'Desarrollador Web',
            'bio' => 'Analista Programador Computacional con sólida experiencia en el desarrollo de
                soluciones tecnológicas. Formación sólida en análisis de sistemas y programación,
                con enfoque en la calidad del código, la resolución eficiente de problemas y el
                trabajo colaborativo. Especializado en el diseño e implementación de soluciones
                funcionales, escalables y orientadas a las necesidades del usuario.',
            'photo' => null, // puedes poner una ruta si tienes una imagen
        ]);
    }
}
