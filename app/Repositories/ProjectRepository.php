<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function getAllPaginated(int $limit = 10)
    {
        return Project::latest()->paginate($limit);
    }

    public function find($id): ?Project
    {
        return Project::find($id);
    }

    public function create(array $data): Project
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data): Project
    {
        $project->update($data);
        return $project;
    }

    public function delete(Project $project): bool
    {
        return $project->delete();
    }
}
