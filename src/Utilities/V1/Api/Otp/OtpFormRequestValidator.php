<?php

namespace Callmeaf\Otp\Utilities\V1\Api\Otp;


use Callmeaf\Base\Utilities\V1\FormRequestValidator;

class OtpFormRequestValidator extends FormRequestValidator
{
    public function send(): array
    {
        return [
            'mobile' => true,
        ];
    }
}
