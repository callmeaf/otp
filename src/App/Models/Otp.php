<?php

namespace Callmeaf\Otp\App\Models;

use Callmeaf\Base\App\Models\BaseModel;

class Otp extends BaseModel
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'code';
    protected $fillable = [
        'code',
        'identifier',
        'expired_at'
    ];

    public static function configKey(): string
    {
        return 'callmeaf-otp';
    }

    public function identifierIsEmail(): bool
    {
        return str($this->identifier)->contains('@');
    }
}
