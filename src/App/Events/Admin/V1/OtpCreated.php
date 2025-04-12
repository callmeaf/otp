<?php

namespace Callmeaf\Otp\App\Events\Admin\V1;

use Callmeaf\Otp\App\Mail\Admin\V1\OtpCodeMail;
use Callmeaf\Otp\App\Models\Otp;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OtpCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Otp $otp)
    {
        if ($otp->identifierIsEmail()) {
            Mail::to($this->otp->identifier)->queue(new OtpCodeMail($otp));
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
