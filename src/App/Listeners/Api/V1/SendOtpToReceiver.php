<?php

namespace Callmeaf\Otp\App\Listeners\Api\V1;

use Callmeaf\Otp\App\Events\Api\V1\OtpCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOtpToReceiver
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OtpCreated $event): void
    {
        $identifier = $event->otp->identifier;

    }
}
