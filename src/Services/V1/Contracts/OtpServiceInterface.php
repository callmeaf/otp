<?php

namespace Callmeaf\Otp\Services\V1\Contracts;

use Callmeaf\Base\Services\V1\Contracts\BaseServiceInterface;
use Callmeaf\Otp\Services\V1\OtpService;
use Callmeaf\Sms\Services\V1\SmsService;

interface OtpServiceInterface extends BaseServiceInterface
{
    public function smsChannel(): SmsService;
    public function sendNewOtp(string $mobile,?array $events = []): OtpService;
    public function newCode(): string;
    public function verifyCode(string $mobile,string $code): bool;
}
