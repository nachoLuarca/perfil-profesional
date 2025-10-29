<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Portafolio Personal',
                'description' => 'Un sitio web profesional para mostrar habilidades y proyectos.',
                'url' => 'https://miportafolio.test',
                'image' => null,
            ],
            [
                'title' => 'Sistema de Inventario',
                'description' => 'Aplicación web en Laravel para la gestión de productos y stock.',
                'url' => 'https://inventario.test',
                'image' => null,
            ],
            [
                'title' => 'Blog de Tecnología',
                'description' => 'Plataforma de publicaciones con panel de administración.',
                'url' => 'https://blogtech.test',
                'image' => null,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
