<?php

namespace App\Repositories;

use App\Models\ContactInfo;

class ContactRepository
{
    public function getContact(): ?ContactInfo
    {
        return ContactInfo::first();
    }

    public function updateOrCreate(array $data): ContactInfo
    {
        $contact = ContactInfo::first();

        if ($contact) {
            $contact->update($data);
            return $contact;
        }

        return ContactInfo::create($data);
    }
}
