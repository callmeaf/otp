<?php

namespace Callmeaf\Otp\Http\Controllers\V1\Api;

use Callmeaf\Base\Http\Controllers\V1\Api\ApiController;
use Callmeaf\Kavenegar\Services\V1\KavenegarService;
use Callmeaf\Otp\Http\Requests\V1\Api\OtpSendRequest;
use Callmeaf\Otp\Services\V1\OtpService;

class OtpController extends ApiController
{
    public function __construct(protected OtpService $otpService)
    {

    }
    public function send(OtpSendRequest $request)
    {
        try {
            $this->otpService->sendNewOtp(mobile: $request->get('mobile'));
             return apiResponse([
                 //
             ],__('callmeaf-base::v1.successful_sent'));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }
}
