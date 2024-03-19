<?php

namespace Callmeaf\Otp\Services\V1;

use Callmeaf\Base\Services\V1\BaseService;
use Callmeaf\Otp\Services\V1\Contracts\OtpServiceInterface;
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
        $this->defaultData['expired_at'] = now()->addSeconds(config('callmeaf-otp.lifetime'));
    }
}
