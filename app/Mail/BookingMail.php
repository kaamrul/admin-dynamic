<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public $subject;
    public $email;
    public $booking;

    public function __construct(string $subject, string $email, $booking = [])
    {
        $this->subject = $subject;
        $this->email = $email;
        $this->booking = $booking;
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
            view: 'email.booking',
        );
    }

    public function attachments()
    {
        return [];
    }
}
