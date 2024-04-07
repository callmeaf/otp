<?php

namespace Callmeaf\Otp\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class OtpExpiredException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message ?: __('callmeaf-otp::v1.errors.expired_otp'), $code ?: Response::HTTP_FORBIDDEN, $previous);
    }
}
