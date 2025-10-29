<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Services\SkillService;
use App\Services\ProjectService;

class HomeController extends Controller
{
    protected $userService;
    protected $skillService;
    protected $projectService;

    public function __construct(
        UserService $userService,
        SkillService $skillService,
        ProjectService $projectService
    ) {
        $this->userService = $userService;
        $this->skillService = $skillService;
        $this->projectService = $projectService;
    }

    public function index()
    {
        $user = $this->userService->getProfile();
        $skills = $this->skillService->listSkills();
        $projects = $this->projectService->listProjects(6);

        return view('home', compact('user', 'skills', 'projects'));
    }
}
