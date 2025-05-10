<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $subject = ($this->data['fromName'] ?? '') . ' - ' . ($this->data['emailSubject'] ?? 'New Message');
        
        return $this
            ->subject($subject)
            ->replyTo($this->data['fromEmail'], $this->data['fromName'])
            ->html("
                <h2>Apartment - {$this->data['emailSubject']}</h2>
                <p><strong>Name:</strong> {$this->data['fromName']}</p>
                <p><strong>Email:</strong> {$this->data['fromEmail']}</p>
                <p><strong>Message:</strong></p>
                <p>" . nl2br(e($this->data['messageContent'])) . "</p>
            ");
    }
}
