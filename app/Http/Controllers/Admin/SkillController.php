<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SkillService;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    protected $service;

    public function __construct(SkillService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $skills = $this->service->listSkills();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $this->service->storeSkill($request);
        return redirect()->route('admin.skills.index')->with('success', 'Competencia creada correctamente.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $this->service->updateSkill($request, $skill);
        return redirect()->route('admin.skills.index')->with('success', 'Competencia actualizada correctamente.');
    }

    public function destroy(Skill $skill)
    {
        $this->service->deleteSkill($skill);
        return redirect()->route('admin.skills.index')->with('success', 'Competencia eliminada correctamente.');
    }
}
