<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Skill;
use App\Models\Project;

class PortfolioRepository
{
    /**
     * Obtener el usuario principal.
     */
    public function getMainUser()
    {
        return User::first();
    }

    /**
     * Obtener todas las habilidades.
     */
    public function getSkills()
    {
        return Skill::all();
    }

    /**
     * Obtener los proyectos más recientes.
     */
    public function getRecentProjects(int $limit = 6)
    {
        return Project::latest()->take($limit)->get();
    }
}
