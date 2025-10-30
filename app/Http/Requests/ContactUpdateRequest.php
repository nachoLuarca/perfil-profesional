<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:500',
        ];
    }
}
