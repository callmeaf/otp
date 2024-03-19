<?php


use Callmeaf\Otp\Enums\OtpStatus;
use Callmeaf\Otp\Enums\OtpType;

return [
    OtpStatus::class => [
        OtpStatus::ACTIVE->name => 'فعال',
        OtpStatus::INACTIVE->name => 'غیرفعال',
    ],
    OtpType::class => [
        OtpType::SMS->name => 'اس ام اس',
    ],
];
