<?php

namespace Callmeaf\Otp\App\Repo;

use Callmeaf\Base\App\Enums\RandomType;
use Callmeaf\Base\App\Repo\V1\BaseRepo;
use Callmeaf\Otp\App\Exceptions\OtpCodeAlreadySentException;
use Callmeaf\Otp\App\Repo\Contracts\OtpRepoInterface;

class OtpRepo extends BaseRepo implements OtpRepoInterface
{
    public function newCode(): string
    {
        $code = \Base::random(length: $this->config['code_length'], type: RandomType::NUMBER);

        if ($this->getQuery()->where('code', $code)->exists()) {
            return $this->newCode();
        }

        return $code;
    }

    public function create(array $data)
    {
        $identifier = $data['identifier'];

        if ($this->alreadySent(identifier: $identifier)) {
            throw new OtpCodeAlreadySentException();
        }

        $data['code'] = $this->newCode();
        $data['expired_at'] = now()->addMinutes(value: $this->config['code_lifetime']);
        return parent::create($data);
    }

    public function verifyCode(string $identifier, string $code): bool
    {
        return $this
            ->getQuery()
            ->where('code', $code)
            ->where('identifier', $identifier)
            ->whereFuture('expired_at')
            ->exists();
    }

    public function alreadySent(string $identifier): bool
    {
        return $this->getQuery()->where('identifier', $identifier)->whereFuture('expired_at')->exists();
    }

    public function expireCode(string $code): bool
    {
        return $this->getQuery()->where('code', $code)->update([
            'expired_at' => now(),
        ]);
    }
}
