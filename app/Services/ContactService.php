<?php

namespace App\Services;

use App\Models\ContactInfo;
use App\Repositories\ContactMessageRepository;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    private ContactMessageRepository $messageRepository;

    public function __construct(ContactMessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function sendMessage(array $data, ContactInfo $contact): void
    {
        // Guardar en la base de datos
        $this->messageRepository->store($data);

        // Enviar correo al contacto principal
        Mail::raw(
            "Mensaje de: {$data['name']} ({$data['email']})\n\n{$data['message']}",
            function ($mail) use ($contact) {
                $mail->to($contact->email)->subject('Nuevo mensaje desde el portafolio');
            }
        );
    }
}
