<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
});
Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::group([
        'prefix' => 'events'
    ], function () {
        Route::get('/', [\App\Http\Controllers\Api\CalendarController::class, 'getEvents']);
        Route::post('/', [\App\Http\Controllers\Api\CalendarController::class, 'createEvent']);
    });
});
