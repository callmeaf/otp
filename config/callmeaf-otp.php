<?php

return [
    'model' => \Callmeaf\Otp\Models\Otp::class,
    'model_resource' => \Callmeaf\Otp\Http\Resources\V1\Api\OtpResource::class,
    'model_resource_collection' => \Callmeaf\Otp\Http\Resources\V1\Api\OtpCollection::class,
    'default_values' => [
        'status' => \Callmeaf\Otp\Enums\OtpStatus::ACTIVE,
        'type' => \Callmeaf\Otp\Enums\OtpType::SMS,
    ],
    'lifetime' => 120, // seconds
    'middlewares' => [
        'send' => [
            'throttle:1,2',
        ],
    ],
    'validations' => [
        'send' => [
            'mobile' => true,
        ],
    ],
    'sms_channel' => \Callmeaf\Kavenegar\Services\V1\KavenegarService::class,
    'code_length' => 5,
];
