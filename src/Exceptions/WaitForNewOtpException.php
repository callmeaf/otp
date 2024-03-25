<?php

namespace Callmeaf\Otp\Exceptions;

class WaitForNewOtpException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message ?: __('callmeaf-otp::v1.wait_for_new_otp'), $code, $previous);
    }
}
