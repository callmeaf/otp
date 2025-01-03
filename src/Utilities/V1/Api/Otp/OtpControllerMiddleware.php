<?php

namespace Callmeaf\Otp\Utilities\V1\Api\Otp;

use Callmeaf\Base\Http\Controllers\BaseController;
use Callmeaf\Base\Utilities\V1\ControllerMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class OtpControllerMiddleware extends ControllerMiddleware
{
    public function __invoke(): array
    {
        return [
            new Middleware(middleware: ['guest:sanctum','throttle:1,1'],only: [
                'send',
            ])
        ];
    }
}
