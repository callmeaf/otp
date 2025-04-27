<?php

namespace Callmeaf\Otp\App\Http\Requests\Admin\V1;

use Callmeaf\Otp\App\Repo\Contracts\OtpRepoInterface;
use Callmeaf\Permission\App\Enums\PermissionCycle;
use Illuminate\Foundation\Http\FormRequest;

class OtpIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \Perm::userCan(PermissionCycle::INDEX,OtpRepoInterface::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
