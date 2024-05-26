<?php

namespace Callmeaf\Otp\Events;

use Callmeaf\Otp\Models\Otp;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OtpSent
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Otp $otp)
    {

    }
}
