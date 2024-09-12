<?php

namespace Callmeaf\Otp\Http\Controllers\V1\Api;

use Callmeaf\Base\Http\Controllers\V1\Api\ApiController;
use Callmeaf\Otp\Events\OtpSent;
use Callmeaf\Otp\Http\Requests\V1\Api\OtpSendRequest;
use Callmeaf\Otp\Services\V1\OtpService;
use Callmeaf\Otp\Utilities\V1\Otp\Api\OtpResources;

class OtpController extends ApiController
{
    protected OtpService $otpService;
    protected OtpResources $otpResources;
    public function __construct()
    {
        app(config('callmeaf-otp.middlewares.otp'))($this);
        $this->otpService = app(config('callmeaf-otp.service'));
    }
    public function send(OtpSendRequest $request)
    {
        try {
            $resources = $this->otpResources->send();
            $data = [];
            $otpService = $this->otpService->sendNewOtp(mobile: $request->get('mobile'),events: [
                OtpSent::class,
            ]);
            if(!app()->isProduction() && config('callmeaf-otp.show_otp_in_develop_mode')) {
                $data['otp'] = $otpService->getModel(asResource: true,attributes: $resources->attributes());
            }
             return apiResponse($data,__('callmeaf-base::v1.successful_sent'));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }
}
