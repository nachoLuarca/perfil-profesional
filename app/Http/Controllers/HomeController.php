<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\Project;
use App\Repositories\ContactRepository;
use App\Services\ContactService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private ContactRepository $contactRepository;
    private ContactService $contactService;

    public function __construct(ContactRepository $contactRepository, ContactService $contactService)
    {
        $this->contactRepository = $contactRepository;
        $this->contactService = $contactService;
    }

    public function index()
    {
        $user = User::first();
        $skills = Skill::all();
        $projects = Project::latest()->paginate(6);
        $contact = $this->contactRepository->getContact();

        return view('home', compact('user', 'skills', 'projects', 'contact'));
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        $contact = $this->contactRepository->getContact();

        if (!$contact) {
            return back()->with('error', 'No hay un correo de contacto configurado.');
        }

        $this->contactService->sendMessage($validated, $contact);

        return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}
