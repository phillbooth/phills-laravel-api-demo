<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

// Catch-all route that triggers a 404 for any web requests
Route::any('{any}', function () {
    throw new NotFoundHttpException;
})->where('any', '.*');
