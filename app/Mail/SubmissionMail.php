<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $submission;

    /**
     * Create a new message instance.
     */
    public function __construct($submission)
    {
        //
        $this->submission = $submission;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengajuan PKL - Internval',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'emails.submission-notify',
    //         with: [ // data yang dikirim ke view
    //             'nama' => $this->submission->nama_mahasiswa,
    //             'kode' => $this->submission->id,
    //         ],
    //     );
    // }

    public function build()
    {
        // Embed logo ke email dan beri nama cid:logo-email
        $this->withSymfonyMessage(function ($message) {
            $message->embedFromPath(public_path('img/logo-email.png'), 'logo-email');
        });

        return $this->subject('Pengajuan PKL - Internval')
            ->markdown('emails.submission-notify')
            ->with([
                'nama' => $this->submission->nama_mahasiswa,
                'kode' => $this->submission->id,
            ]);
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
