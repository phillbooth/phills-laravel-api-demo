<?php

use App\Http\Controllers\FormSubmissionController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:60,1', 'api'])->group(function () {
    Route::get('/vehicles', [VehicleController::class, 'index']);
});

Route::middleware(['throttle:60,1', 'api'])->group(function () {
    Route::post('/form-submission', [FormSubmissionController::class, 'submit']);
});

Route::any('{any}', function () {
    throw new NotFoundHttpException;
})->where('any', '.*');
