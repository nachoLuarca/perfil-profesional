<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ContactMessageRepository;

class ContactMessageController extends Controller
{
    private ContactMessageRepository $repository;

    public function __construct(ContactMessageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $messages = $this->repository->all();
        return view('admin.contact.messages', compact('messages'));
    }
}
