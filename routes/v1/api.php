<?php

use Callmeaf\Otp\Http\Controllers\V1\Api\OtpController;
use \Illuminate\Support\Facades\Route;

Route::prefix(config('callmeaf-base.api.prefix_url'))->as(config('callmeaf-base.api.prefix_route_name'))->middleware(config('callmeaf-otp.middlewares.global'))->controller(config('callmeaf-otp.controllers.global'))->group(function () {
    Route::post('/otp/send','send')->middleware(config('callmeaf-otp.middlewares.send'));
});
