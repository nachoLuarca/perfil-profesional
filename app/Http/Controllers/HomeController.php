<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::first();
        $skills = Skill::all();
        $projects = Project::latest()->paginate(6);
        return view('home', compact('user','skills','projects'));
    }
}
