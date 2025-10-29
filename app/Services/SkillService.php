<?php

namespace App\Services;

use App\Repositories\SkillRepository;
use Illuminate\Http\Request;

class SkillService
{
    protected $repo;

    public function __construct(SkillRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listSkills()
    {
        return $this->repo->getAll();
    }

    public function storeSkill(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100'
        ]);

        return $this->repo->create($data);
    }

    public function updateSkill(Request $request, $skill)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100'
        ]);

        return $this->repo->update($skill, $data);
    }

    public function deleteSkill($skill)
    {
        return $this->repo->delete($skill);
    }
}
