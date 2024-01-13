<?php

namespace App\Mail\Company;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewCompanyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nameCompany;

    public function __construct($nameCompany)
    {
        $this->nameCompany=$nameCompany;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Company Added',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.company.new-company-mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
