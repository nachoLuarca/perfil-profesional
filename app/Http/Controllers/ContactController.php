<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSendRequest;
use App\Repositories\ContactRepository;
use App\Services\ContactService;

class ContactController extends Controller
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
        $contact = $this->contactRepository->getContact();
        return view('contact.index', compact('contact'));
    }

    public function send(ContactSendRequest $request)
    {
        $contact = $this->contactRepository->getContact();

        if (!$contact) {
            return back()->with('error', 'No hay un correo configurado.');
        }

        $this->contactService->sendMessage($request->validated(), $contact);

        return back()->with('success', 'Mensaje enviado correctamente.');
    }
}
