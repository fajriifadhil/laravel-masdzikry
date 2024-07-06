<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendInvoice extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $orderId, $name, $service, $method, $total, $type;
    public function __construct($orderId, $name, $service, $method, $total, $type) {
        $this->orderId = $orderId;
        $this->name = $name;
        $this->service = $service;
        $this->method = $method;
        $this->total  = $total;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Invoice Pembayaran Mas Dzikry',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            view: 'email.payment',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        return [];
    }
}
