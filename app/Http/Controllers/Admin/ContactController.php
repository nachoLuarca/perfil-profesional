<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUpdateRequest;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function edit()
    {
        $contact = $this->contactRepository->getContact();
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(ContactUpdateRequest $request)
    {
        $this->contactRepository->updateOrCreate($request->validated());
        return redirect()->route('admin.contact.edit')->with('success', 'Información actualizada.');
    }
}
