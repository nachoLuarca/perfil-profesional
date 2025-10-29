<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProjectService;
use App\Models\Project;

class ProjectController extends Controller
{
    protected $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $projects = $this->service->listProjects();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $this->service->storeProject($request);
        return redirect()->route('admin.projects.index')->with('success', 'Proyecto creado correctamente.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(\Illuminate\Http\Request $request, Project $project)
    {
        $this->service->updateProject($request, $project);
        return redirect()->route('admin.projects.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Project $project)
    {
        $this->service->deleteProject($project);
        return redirect()->route('admin.projects.index')->with('success', 'Proyecto eliminado correctamente.');
    }
}
