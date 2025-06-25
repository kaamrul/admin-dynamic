<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class DefaultMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public $subject;
    public $body_message;
    public $city2;
    public $email2;
    public $name2;
    public $phone2;
    public $fromContact2;
    public $data;

    public function __construct(string $subject, string $message, array $data = [], $fromContact = false)
    {
        $this->subject = $subject;
        $this->body_message = $message;
        $this->fromContact2 = $fromContact;
        $this->data = $data;
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
            view: 'email.default',
        );
    }

    public function attachments()
    {
        return [];
    }
}
