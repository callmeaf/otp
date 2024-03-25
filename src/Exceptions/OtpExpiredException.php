<?php

namespace Callmeaf\Otp\Exceptions;

class OtpExpiredException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message ?: __('callmeaf-otp::v1.expired_otp'), $code, $previous);
    }
}
