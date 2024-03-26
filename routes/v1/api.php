<?php

use Callmeaf\Otp\Http\Controllers\V1\Api\OtpController;
use \Illuminate\Support\Facades\Route;

Route::prefix(config('callmeaf-base.prefix_api'))->middleware(config('callmeaf-otp.middlewares.global'))->controller(config('callmeaf-otp.controllers.global'))->group(function () {
    Route::post('/otp/send','send')->middleware(config('callmeaf-otp.middlewares.send'));
});
