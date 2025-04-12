<?php

namespace Callmeaf\Otp\App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @extends ResourceCollection<OtpResource>
 */
class OtpCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, OtpResource>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
