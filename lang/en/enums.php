<?php


use Callmeaf\Otp\Enums\OtpStatus;
use Callmeaf\Otp\Enums\OtpType;

return [
    OtpStatus::class => [
        OtpStatus::ACTIVE->name => 'Active',
        OtpStatus::INACTIVE->name => 'InActive',
    ],
    OtpType::class => [
        OtpType::SMS->name => 'Sms',
    ],
];
