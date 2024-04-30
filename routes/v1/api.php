<?php

use \Illuminate\Support\Facades\Route;

Route::prefix(config('callmeaf-base.api.prefix_url'))->as(config('callmeaf-base.api.prefix_route_name'))->middleware(config('callmeaf-base.api.middlewares'))->group(function () {
    Route::middleware(config('callmeaf-otp.middlewares.global'))->controller(config('callmeaf-otp.controllers.global'))->group(function () {
        Route::post('/otp/send','send')->middleware(config('callmeaf-otp.middlewares.send'))->name('otp.send');
    });
});
