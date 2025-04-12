<?php

namespace Callmeaf\Otp;

use Callmeaf\Base\CallmeafServiceProvider;
use Callmeaf\Base\Contracts\ServiceProvider\HasConfig;
use Callmeaf\Base\Contracts\ServiceProvider\HasEvent;
use Callmeaf\Base\Contracts\ServiceProvider\HasLang;
use Callmeaf\Base\Contracts\ServiceProvider\HasMigration;
use Callmeaf\Base\Contracts\ServiceProvider\HasRepo;
use Callmeaf\Base\Contracts\ServiceProvider\HasRoute;
use Callmeaf\Base\Contracts\ServiceProvider\HasView;
use Callmeaf\Otp\App\Repo\Contracts\OtpRepoInterface;

class CallmeafOtpServiceProvider extends CallmeafServiceProvider implements HasRepo, HasEvent, HasRoute, HasMigration, HasConfig, HasLang, HasView
{
    protected function serviceKey(): string
    {
        return 'otp';
    }

    public function repo(): string
    {
        return OtpRepoInterface::class;
    }
}
