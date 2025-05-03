<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicationSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user) { $this->user = $user; }

    public function build()
    {
        $pdf = Pdf::loadView('pdf.application', ['user' => $this->user]);

        return $this->subject('Application Submitted Successfully')
            ->markdown('emails.application_submitted')
            ->attachData($pdf->output(), 'application.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}

