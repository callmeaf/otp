<?php

namespace Callmeaf\Otp\Models;

use Callmeaf\Base\Contracts\HasEnum;
use Callmeaf\Base\Traits\HasDate;
use Callmeaf\Base\Traits\HasStatus;
use Callmeaf\Base\Traits\HasType;
use Callmeaf\Otp\Enums\OtpStatus;
use Callmeaf\Otp\Enums\OtpType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model implements HasEnum
{
    use HasFactory,HasStatus,HasType,HasDate;

    protected $fillable = [
        'status',
        'type',
        'code',
        'mobile',
        'expired_at'
    ];

    protected $casts = [
        'status' => OtpStatus::class,
        'type' => OtpType::class,
    ];

    public function expiredAtText(): Attribute
    {
        return Attribute::get(
            fn() => verta($this->expired_at)->format('Y-m-d H:i:s'),
        );
    }

    public static function enumsLang(): array
    {
        return __('callmeaf-otp::enums');
    }
}
