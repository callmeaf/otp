<?php

return [
    'model' => \Callmeaf\Otp\Models\Otp::class,
    'model_resource' => \Callmeaf\Otp\Http\Resources\V1\Api\OtpResource::class,
    'model_resource_collection' => \Callmeaf\Otp\Http\Resources\V1\Api\OtpCollection::class,
    'service' => \Callmeaf\Otp\Services\V1\OtpService::class,
    'service_interface' => \Callmeaf\Otp\Services\V1\Contracts\OtpServiceInterface::class,
    'default_values' => [
        'status' => \Callmeaf\Otp\Enums\OtpStatus::ACTIVE,
        'type' => \Callmeaf\Otp\Enums\OtpType::SMS,
    ],
    'sms_channel' => \Callmeaf\Kavenegar\Services\V1\KavenegarService::class,
    'length' => 5, // code length
    'lifetime' => 60, // seconds
    'validations' => [
        'send' => [
            'mobile' => true,
        ],
    ],
    'controllers' => [
        'global' => \Callmeaf\Otp\Http\Controllers\V1\Api\OtpController::class,
    ],
    'middlewares' => [
        'global' => [],
        'send' => [
            'guest:sanctum',
            'throttle:1,2',
        ],
    ],
];
