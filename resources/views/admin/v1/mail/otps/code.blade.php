<x-mail::message>
# {{__('callmeaf-otp::admin_v1.mail.otp_code.title')}}

{{__('callmeaf-otp::admin_v1.mail.otp_code.body')}}

@component('mail::panel')
    ## {{ $code }}
@endcomponent

{{__('callmeaf-otp::admin_v1.mail.otp_code.footer',['x' => $codeLifetime])}}

{{ config('app.name') }}
</x-mail::message>
