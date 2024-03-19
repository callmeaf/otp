<?php

use Callmeaf\Otp\Http\Controllers\V1\Api\OtpController;
use \Illuminate\Support\Facades\Route;

Route::prefix('api/af/v1')->group(function () {
    Route::post('/otp/send',[OtpController::class,'send'])->middleware(config('callmeaf-otp.middlewares.send'));
});
