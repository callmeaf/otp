<?php

namespace Callmeaf\Otp\App\Exceptions;

use Callmeaf\Otp\App\Repo\Contracts\OtpRepoInterface;
use Exception;
use Illuminate\Http\Request;

class OtpCodeAlreadySentException extends Exception
{
    public function render(Request $request): \Illuminate\Http\JsonResponse
    {

        return response()->json([
            'message' => __('callmeaf-otp::errors.otp_code_already_sent', [
                'minutes' => app(OtpRepoInterface::class)->config['code_lifetime'],
            ])
        ], \Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
    }

}
