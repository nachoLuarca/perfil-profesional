<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;

class ProjectService
{
    protected $repo;

    public function __construct(ProjectRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listProjects(int $limit = 10)
    {
        return $this->repo->getAllPaginated($limit);
    }

    public function storeProject(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
            'url' => 'nullable|url'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        return $this->repo->create($data);
    }

    public function updateProject(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
            'url' => 'nullable|url'
        ]);

        if ($request->hasFile('image')) {
            // Borrar la imagen anterior si existe
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        return $this->repo->update($project, $data);
    }

    public function deleteProject(Project $project)
    {
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }
        return $this->repo->delete($project);
    }
}
