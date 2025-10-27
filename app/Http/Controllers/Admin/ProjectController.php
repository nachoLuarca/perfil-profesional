<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
            'url' => 'nullable|url'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects','public');
        }

        Project::create($validated);
        return redirect()->route('admin.projects.index')->with('success','Proyecto creado correctamente.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
            'url' => 'nullable|url'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects','public');
        }

        $project->update($validated);
        return redirect()->route('admin.projects.index')->with('success','Proyecto actualizado.');
    }

    public function destroy(Project $project)
    {
        // opcional: borrar archivo anterior
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success','Proyecto eliminado.');
    }
}

