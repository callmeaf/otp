<?php

use \Illuminate\Support\Facades\Route;

Route::prefix(config('callmeaf-base.api.prefix_url'))->as(config('callmeaf-base.api.prefix_route_name'))->group(function () {
    Route::controller(config('callmeaf-otp.controllers.otp'))->group(function () {
        Route::post('/otp/send','send')->name('otp.send');
    });
});
