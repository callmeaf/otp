<?php

namespace Callmeaf\Otp\App\Repo\Contracts;

use Callmeaf\Base\App\Repo\Contracts\BaseRepoInterface;
use Callmeaf\Otp\App\Http\Resources\Api\V1\OtpCollection;
use Callmeaf\Otp\App\Http\Resources\Api\V1\OtpResource;
use Callmeaf\Otp\App\Models\Otp;

/**
 * @extends BaseRepoInterface<Otp,OtpResource,OtpCollection>
 */
interface OtpRepoInterface extends BaseRepoInterface
{
    public function newCode(): string;

    public function verifyCode(string $identifier, string $code): bool;

    public function alreadySent(string $identifier): bool;

    public function expireCode(string $code): bool;
}
