<?php

namespace Callmeaf\Otp\Services\V1;

use Callmeaf\Base\Services\V1\BaseService;
use Callmeaf\Otp\Exceptions\OtpExpiredException;
use Callmeaf\Otp\Exceptions\WaitForNewOtpException;
use Callmeaf\Otp\Services\V1\Contracts\OtpServiceInterface;
use Callmeaf\Sms\Services\V1\SmsService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OtpService extends BaseService implements OtpServiceInterface
{
    public function __construct(?Builder $query = null, ?Model $model = null, ?Collection $collection = null, ?string $resource = null, ?string $resourceCollection = null, array $defaultData = [])
    {
        parent::__construct($query, $model, $collection, $resource, $resourceCollection, $defaultData);
        $this->query = app(config('callmeaf-otp.model'))->query();
        $this->resource = config('callmeaf-otp.model_resource');
        $this->resourceCollection = config('callmeaf-otp.model_resource_collection');
        $this->defaultData = config('callmeaf-otp.default_values');
        $this->defaultData['expired_at'] = now()->addSeconds($this->lifetime());
    }

    public function smsChannel(): SmsService
    {
        return app(config('callmeaf-otp.sms_channel'));
    }

    public function sendNewOtp(string $mobile): OtpService
    {
        if($this->freshQuery()->where('mobile',$mobile)->where('expired_at','>',now())->exists()) {
            throw new WaitForNewOtpException();
        }
        $code = $this->newCode();
        $this->updateOrCreate([
            'mobile' => $mobile
        ],[
            'mobile' => $mobile,
            'code' => $code,
        ]);
//        $smsChannel = $this->smsChannel();
//        $smsChannel->sendViaPattern(
//            pattern: $smsChannel->verifyOtpPattern(),
//            mobile: $mobile,
//            values: [
//                $code,
//            ],
//        );
        return $this;
    }

    public function newCode(): string
    {
        $code = randomDigits($this->codeLength());
        if($this->freshQuery()->where('code',$code)->exists()) {
            return $this->newCode();
        }
        return $code;
    }

    public function verifyCode(string $mobile, string $code): bool
    {
        $this->freshQuery()
            ->where([
                'mobile' => $mobile,
                'code' => $code,
            ])->where('expired_at','>',now())
            ->first();
        if(!$this->model) {
            throw new OtpExpiredException();
        }

        $this->forceDelete();
        return true;
    }

    private function codeLength(): int
    {
        return config('callmeaf-otp.length');
    }

    private function lifetime(): int
    {
        return config('callmeaf-otp.lifetime');
    }
}
