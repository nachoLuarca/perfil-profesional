<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Mostrar el dashboard de administración.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $projects = Project::latest()->paginate(5);
        $skills = Skill::all();

        return view('admin.dashboard', compact('projects', 'skills'));
    }

    /**
     * Mostrar el perfil del usuario autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        return view('admin.profile', compact('user'));
    }
}
