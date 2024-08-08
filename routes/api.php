<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    });
});

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::prefix('projects')->group(function () {
        Route::get('/', \App\Http\Controllers\Api\Projects\GetProjectController::class);
        Route::get('/{uuid}', \App\Http\Controllers\Api\Projects\GetProjectDetailController::class);
        Route::get('/{uuid}/tasks', \App\Http\Controllers\Api\Projects\GetProjectTasksController::class);
    });
});
