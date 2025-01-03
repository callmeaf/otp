<?php

return [
    'model' => \Callmeaf\Otp\Models\Otp::class,
    'model_resource' => \Callmeaf\Otp\Http\Resources\V1\Api\OtpResource::class,
    'model_resource_collection' => \Callmeaf\Otp\Http\Resources\V1\Api\OtpCollection::class,
    'service' => \Callmeaf\Otp\Services\V1\OtpService::class,
    'default_values' => [
        'status' => \Callmeaf\Otp\Enums\OtpStatus::ACTIVE,
        'type' => \Callmeaf\Otp\Enums\OtpType::SMS,
    ],
    'events' => [
        \Callmeaf\Otp\Events\OtpSent::class => [
            // listeners
        ],
    ],
    'sms_channel' => \Callmeaf\Farazsms\Services\V1\FarazsmsService::class,
    'length' => 5, // code length
    'lifetime' => 60, // seconds
    'show_otp_in_develop_mode' => true, // display otp model in api response only in develop mode
    'validations' => [
        'otp' => \Callmeaf\Otp\Utilities\V1\Api\Otp\OtpFormRequestValidator::class,
    ],
    'resources' => [
        'otp' => \Callmeaf\Otp\Utilities\V1\Api\Otp\OtpResources::class,
    ],
    'controllers' => [
        'otp' => \Callmeaf\Otp\Http\Controllers\V1\Api\OtpController::class,
    ],
    'form_request_authorizers' => [
        'otp' => \Callmeaf\Otp\Utilities\V1\Api\Otp\OtpFormRequestAuthorizer::class,
    ],
    'middlewares' => [
        'otp' => \Callmeaf\Otp\Utilities\V1\Api\Otp\OtpControllerMiddleware::class,
    ],
];
