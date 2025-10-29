<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProjectService;
use App\Services\SkillService;

class AdminController extends Controller
{
    protected $projectService;
    protected $skillService;

    public function __construct(ProjectService $projectService, SkillService $skillService)
    {
        $this->projectService = $projectService;
        $this->skillService = $skillService;
    }

    public function dashboard()
    {
        $projects = $this->projectService->listProjects(5);
        $skills = $this->skillService->listSkills();

        return view('admin.dashboard', compact('projects', 'skills'));
    }
}
