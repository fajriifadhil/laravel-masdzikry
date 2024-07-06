<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOTP extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $otp, $name, $type;
    public function __construct($otp, $name, $type) {
        $this->otp = (string) $otp;
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            subject: "Verifikasi Mas Dzikry",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            view: $this->type == 'registration' ? 'email.otp-registration' : 'email.otp-forgot-password',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        return [
            // Attachment::fromPath(storage_path('app/enter-otp.png'))->as('heading.png'),
        ];
    }
}
