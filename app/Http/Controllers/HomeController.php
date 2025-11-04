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
        ], [
            'name.required' => 'Por favor, ingresa tu nombre.',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.max' => 'El nombre no puede superar los 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'message.required' => 'Debes escribir un mensaje antes de enviarlo.',
            'message.min' => 'El mensaje debe tener al menos 10 caracteres.',
        ]);

        $contact = $this->contactRepository->getContact();

        if (!$contact) {
            return back()->with('error', 'No hay un correo de contacto configurado.');
        }

        $this->contactService->sendMessage($validated, $contact);

        return back()->with('success', 'Tu mensaje ha sido enviado correctamente. ¡Gracias por contactarme!');
    }
}
