<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationCode extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public string $code)
    {
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@Jobpilot.com', 'JobPilot'),
            subject: 'JobPilot',
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.auth.register')
            ->subject('Confirm Your email, please');
    }
}
