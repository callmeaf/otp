<?php

namespace Callmeaf\Otp\Utilities\V1\Api\Otp;

use Callmeaf\Base\Utilities\V1\FormRequestAuthorizer;

class OtpFormRequestAuthorizer extends FormRequestAuthorizer
{
    public function send(): bool
    {
        return true;
    }
}
