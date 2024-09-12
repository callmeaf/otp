<?php

namespace Callmeaf\Otp\Utilities\V1\Otp\Api;


use Callmeaf\Base\Utilities\V1\Resources;

class OtpResources extends Resources
{
    public function send(): self
    {
        $this->data = [
            'attributes' => [
                'code',
            ],
        ];
        return $this;
    }
}
