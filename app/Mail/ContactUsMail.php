<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public $subject;
    public $body_message;
    public $email;
    public $name;
    public $phone;
    public $city;

    public function __construct(string $subject, string $message)
    {
        // $this->subject = $data['subject'];
        // $this->body_message = $data['message'];
        // $this->city = $data['city'];
        // $this->email = $data['email'];
        // $this->name = $data['name'];
        // $this->phone = $data['phone'];
        $this->subject = $subject;
        $this->body_message = $message;
    }

    public function envelope()
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content()
    {
        return new Content(
            view: 'email.contactUs',
        );
    }

    public function attachments()
    {
        return [];
    }
}
