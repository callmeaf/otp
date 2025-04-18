<?php

namespace Callmeaf\Otp\App\Listeners\Admin\V1;

use Callmeaf\Otp\App\Events\Admin\V1\OtpCreated;
use Callmeaf\Otp\App\Mail\Admin\V1\OtpCodeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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
        $otp = $event->otp;
        if($otp->identifierIsEmail()) {
            $identifier = $otp->identifier;

            Mail::to($identifier)->send(new OtpCodeMail($otp));
        }
    }
}
