<?php

namespace Callmeaf\Otp\Http\Requests\V1\Api;

use Illuminate\Foundation\Http\FormRequest;

class OtpSendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return collect([
            'mobile' => ['string'],
        ])->map(
            fn($values,$key) => validationManager($key,$values,config("callmeaf-otp.validations.send")))
            ->toArray();
    }

}
