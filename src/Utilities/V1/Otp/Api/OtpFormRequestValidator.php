<?php

namespace Callmeaf\Otp\Utilities\V1\Otp\Api;


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
