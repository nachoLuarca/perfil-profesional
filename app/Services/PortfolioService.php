<?php

namespace App\Services;

use App\Repositories\PortfolioRepository;

class PortfolioService
{
    protected $repo;

    public function __construct(PortfolioRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Obtiene todos los datos del portafolio listos para la vista.
     */
    public function getPortfolioData(): array
    {
        $user = $this->repo->getMainUser();
        $skills = $this->repo->getSkills();
        $projects = $this->repo->getRecentProjects();

        return compact('user', 'skills', 'projects');
    }
}
