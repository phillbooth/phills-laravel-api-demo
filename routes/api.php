<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\FormSubmissionController;

Route::middleware(['throttle:60,1', 'api'])->group(function () {
    Route::get('/vehicles', [VehicleController::class, 'index']);
});


Route::middleware(['throttle:60,1', 'api'])->group(function () {
    Route::post('/form-submission', [FormSubmissionController::class, 'submit']);
});

Route::any('{any}', function () {
    throw new NotFoundHttpException;
})->where('any', '.*');
