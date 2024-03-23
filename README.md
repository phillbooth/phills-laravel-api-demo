Project Setup Instructions

Laravel backend (backend-api) and an Express frontend (frontend-express).

Laravel Backend Setup (backend-api)

Initial Setup:

1. Navigate to the backend-api directory in your terminal.
2. Run 'composer install' to install PHP dependencies.
3. Copy '.env.example' to '.env' and configure your environment settings, especially the database connection.
4. Run 'php artisan key:generate' to generate an application key.
5. Run 'php artisan migrate' to run database migrations.
6. Run 'php artisan db:seed' to seed your database with initial data (if applicable).
7. Run 'php artisan serve' to start the Laravel development server.
8. Optionally Run 'php artisan queue:work' along side php artisan serve to start the laravel queue

As a note localhost in the .env should be set to http://localhost:8000


Express Frontend Setup (frontend-express):

1. Navigate to the frontend-express directory in your terminal.
2. Run 'npm install' to install Node.js dependencies.
3. Configure your environment settings if necessary, such as the API endpoint.
4. Start the server with 'npm start' or 'node app.js', depending on your setup.

List of files created in the Laravel app:

backend-api\routes\api.php
backend-api\app\Http\Controllers\FormSubmissionController.php
backend-api\app\Http\Controllers\VehicleController.php
backend-api\app\Http\Resources\VehiclePricingResource.php
backend-api\app\Http\Resources\VehicleResource.php
backend-api\app\Events\FormSubmitted.php
backend-api\app\Listeners\ProcessFormSubmission.php

Updated Files in the Laravel app
backend-api\vendor\laravel\framework\src\Illuminate\Events\EventServiceProvider.php
backend-api\vendor\laravel\framework\src\Illuminate\Foundation\Support\Providers\EventServiceProvider.php
