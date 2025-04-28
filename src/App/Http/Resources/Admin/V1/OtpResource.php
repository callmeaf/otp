<?php

namespace Callmeaf\Otp\App\Http\Resources\Admin\V1;

use Callmeaf\Otp\App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Otp $resource
 */
class OtpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'identifier' => $this->identifier,
            'expired_at' => $this->expired_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            $this->mergeWhen(app()->isLocal(), [
                'code' => $this->code,
            ]),
        ];
    }
}
