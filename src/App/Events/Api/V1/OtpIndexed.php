<?php

namespace Callmeaf\Otp\App\Events\Api\V1;

use Callmeaf\Otp\App\Models\Otp;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OtpIndexed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @param Collection<Otp> $otps
     * Create a new event instance.
     */
    public function __construct(Collection $otps)
    {
        //
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
