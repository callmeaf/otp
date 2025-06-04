<?php

use Callmeaf\Base\App\Enums\RequestType;

return [
    'model' => \Callmeaf\Otp\App\Models\Otp::class,
    'route_key_name' => 'code',
    'repo' => \Callmeaf\Otp\App\Repo\OtpRepo::class,
    'code_length' => 5,
    'code_lifetime' => 1, // based on minutes
    'resources' => [
        RequestType::API->value => [
            'resource' => \Callmeaf\Otp\App\Http\Resources\Api\V1\OtpResource::class,
            'resource_collection' => \Callmeaf\Otp\App\Http\Resources\Api\V1\OtpCollection::class,
        ],
        RequestType::WEB->value => [
            'resource' => \Callmeaf\Otp\App\Http\Resources\Web\V1\OtpResource::class,
            'resource_collection' => \Callmeaf\Otp\App\Http\Resources\Web\V1\OtpCollection::class,
        ],
        RequestType::ADMIN->value => [
            'resource' => \Callmeaf\Otp\App\Http\Resources\Admin\V1\OtpResource::class,
            'resource_collection' => \Callmeaf\Otp\App\Http\Resources\Admin\V1\OtpCollection::class,
        ],
    ],
    'events' => [
        RequestType::API->value => [
            \Callmeaf\Otp\App\Events\Api\V1\OtpIndexed::class => [
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Api\V1\OtpCreated::class => [
                \Callmeaf\Otp\App\Listeners\Api\V1\SendOtpToReceiver::class,
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Api\V1\OtpShowed::class => [
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Api\V1\OtpUpdated::class => [
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Api\V1\OtpDeleted::class => [
                // listeners
            ],
        ],
        RequestType::WEB->value => [
            \Callmeaf\Otp\App\Events\Web\V1\OtpIndexed::class => [
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Web\V1\OtpCreated::class => [
//                \Callmeaf\Otp\App\Listeners\Web\V1\SendOtpToReceiver::class,
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Web\V1\OtpShowed::class => [
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Web\V1\OtpUpdated::class => [
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Web\V1\OtpDeleted::class => [
                // listeners
            ],
        ],
        RequestType::ADMIN->value => [
            \Callmeaf\Otp\App\Events\Admin\V1\OtpIndexed::class => [
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Admin\V1\OtpCreated::class => [
                \Callmeaf\Otp\App\Listeners\Admin\V1\SendOtpToReceiver::class,
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Admin\V1\OtpShowed::class => [
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Admin\V1\OtpUpdated::class => [
                // listeners
            ],
            \Callmeaf\Otp\App\Events\Admin\V1\OtpDeleted::class => [
                // listeners
            ],
        ],
    ],
    'requests' => [
        RequestType::API->value => [
            'index' => \Callmeaf\Otp\App\Http\Requests\Api\V1\OtpIndexRequest::class,
            'store' => \Callmeaf\Otp\App\Http\Requests\Api\V1\OtpStoreRequest::class,
            'show' => \Callmeaf\Otp\App\Http\Requests\Api\V1\OtpShowRequest::class,
            'update' => \Callmeaf\Otp\App\Http\Requests\Api\V1\OtpUpdateRequest::class,
            'destroy' => \Callmeaf\Otp\App\Http\Requests\Api\V1\OtpDestroyRequest::class,
        ],
        RequestType::WEB->value => [
            'index' => \Callmeaf\Otp\App\Http\Requests\Web\V1\OtpIndexRequest::class,
            'store' => \Callmeaf\Otp\App\Http\Requests\Web\V1\OtpStoreRequest::class,
            'show' => \Callmeaf\Otp\App\Http\Requests\Web\V1\OtpShowRequest::class,
            'update' => \Callmeaf\Otp\App\Http\Requests\Web\V1\OtpUpdateRequest::class,
            'destroy' => \Callmeaf\Otp\App\Http\Requests\Web\V1\OtpDestroyRequest::class,
        ],
        RequestType::ADMIN->value => [
            'index' => \Callmeaf\Otp\App\Http\Requests\Admin\V1\OtpIndexRequest::class,
            'store' => \Callmeaf\Otp\App\Http\Requests\Admin\V1\OtpStoreRequest::class,
            'show' => \Callmeaf\Otp\App\Http\Requests\Admin\V1\OtpShowRequest::class,
            'update' => \Callmeaf\Otp\App\Http\Requests\Admin\V1\OtpUpdateRequest::class,
            'destroy' => \Callmeaf\Otp\App\Http\Requests\Admin\V1\OtpDestroyRequest::class,
        ],
    ],
    'controllers' => [
        RequestType::API->value => [
            'otp' => \Callmeaf\Otp\App\Http\Controllers\Api\V1\OtpController::class,
        ],
        RequestType::WEB->value => [
            'otp' => \Callmeaf\Otp\App\Http\Controllers\Web\V1\OtpController::class,
        ],
        RequestType::ADMIN->value => [
            'otp' => \Callmeaf\Otp\App\Http\Controllers\Admin\V1\OtpController::class,
        ],
    ],
    'routes' => [
        RequestType::API->value => [
            'prefix' => 'otps',
            'as' => 'otps.',
            'middleware' => [],
        ],
        RequestType::WEB->value => [
            'prefix' => 'otps',
            'as' => 'otps.',
            'middleware' => [
                'route_status:' . \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND
            ],
        ],
        RequestType::ADMIN->value => [
            'prefix' => 'otps',
            'as' => 'otps.',
            'middleware' => [

            ],
        ],
    ],
];
