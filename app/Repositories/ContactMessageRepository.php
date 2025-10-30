<?php

namespace App\Repositories;

use App\Models\ContactMessage;

class ContactMessageRepository
{
    public function all()
    {
        return ContactMessage::latest()->paginate(10);
    }

    public function store(array $data): ContactMessage
    {
        return ContactMessage::create($data);
    }
}
