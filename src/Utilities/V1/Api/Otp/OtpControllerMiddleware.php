<?php

namespace Callmeaf\Otp\Utilities\V1\Api\Otp;

use Callmeaf\Base\Http\Controllers\BaseController;
use Callmeaf\Base\Utilities\V1\ControllerMiddleware;

class OtpControllerMiddleware extends ControllerMiddleware
{
    public function __invoke(BaseController $controller): void
    {
        $controller->middleware([
            'guest:sanctum',
            'throttle:1,1',
        ])->only([
            'send',
        ]);
    }
}
