<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $url;
    public $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;

        // Use the route name defined in your web.php for password resetting
        $this->url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $this->email,
        ], false));
    }

    /**
     * Get the message envelope (Subject and From address)
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset Your ToolsByPrabhat Password',
        );
    }

    /**
     * Get the message content definition (The View)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.password_reset', // Make sure this matches your blade path
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
