<?php

namespace Callmeaf\Otp\App\Mail\Admin\V1;

use Callmeaf\Otp\App\Models\Otp;
use Callmeaf\Otp\App\Repo\Contracts\OtpRepoInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Otp $otp
     * Create a new message instance.
     */
    public function __construct(public $otp)
    {
        $this->setQueue('otps');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('callmeaf-otp::admin_v1.mail.otp_code.subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $otpRepo = app(OtpRepoInterface::class);
        return new Content(
            markdown: 'callmeaf-otp::admin.v1.mail.otps.code',
            with: [
                'code' => $this->otp->code,
                'codeLifetime' => $otpRepo->config['code_lifetime'],
            ]
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

    /**
     * @param mixed $queue
     */
    public function setQueue($queue): void
    {
        $this->queue = $queue;
    }

}
