<?php

use Illuminate\Support\Facades\Route;

[
    $controllers,
    $prefix,
    $as,
    $middleware,
] = Base::getRouteConfigFromRepo(repo: \Callmeaf\Otp\App\Repo\Contracts\OtpRepoInterface::class);

Route::apiResource($prefix, $controllers['otp'])->only(['store'])->middleware($middleware);
