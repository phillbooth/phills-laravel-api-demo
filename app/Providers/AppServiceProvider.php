<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $listen = [
        FormSubmitted::class => [
            ProcessFormSubmission::class,
        ],
    ];
    
}
