# Project Setup Instructions

## Laravel Backend Setup (backend-api)

### Initial Setup:


1. Navigate to the `backend-api` directory in your terminal.
2. Run `composer install` to install PHP dependencies.
3. Copy `.env.example` to `.env` and configure your environment settings, especially the database connection.
As a note, ensure that the `APP_URL` in the `.env` file is set to `http://localhost:8000`.

4. Run `php artisan key:generate` to generate an application key.
5. Run `php artisan migrate` to run database migrations.
6. Run `php artisan db:seed` to seed your database with initial data (if applicable).
7. Run `php artisan serve` to start the Laravel development server.
8. Optionally, run `php artisan queue:work` alongside `php artisan serve` to start the Laravel queue.

## Express Frontend Setup (frontend-express):

1. Navigate to the `frontend-express` directory in your terminal.
2. Run `npm install` to install Node.js dependencies.
3. Configure your environment settings if necessary, such as the API endpoint.
4. Start the server with `npm start` or `node app.js`, depending on your setup.


## List of files created in the Laravel app:

- `backend-api\routes\api.php`
- `backend-api\app\Http\Controllers\FormSubmissionController.php`
- `backend-api\tests\Unit\FormSubmissionControllerTest.php`
- `backend-api\app\Http\Controllers\VehicleController.php`
- `backend-api\app\Http\Resources\VehiclePricingResource.php`
- `backend-api\app\Http\Resources\VehicleResource.php`
- `backend-api\app\Events\FormSubmitted.php`
- `backend-api\app\Listeners\ProcessFormSubmission.php`


## Updated Files in the Laravel app:

- `backend-api\vendor\laravel\framework\src\Illuminate\Events\EventServiceProvider.php`
- `backend-api\vendor\laravel\framework\src\Illuminate\Foundation\Support\Providers\EventServiceProvider.php`


### Testing Commands:

- Run PHPUnit tests: `php artisan test`

### Laravel Pint (PHP CD FIxer) Commands:
- Run Pint: `./vendor/bin/pint --test`
- Run Pint: `./vendor/bin/pint`


--

**Note on SOLID Principles:**

This Laravel application adheres to the SOLID principles of object-oriented design. Each component follows:

- **Single Responsibility Principle**: Classes and methods are designed to have a single responsibility, making the codebase easier to understand and maintain.
- **Open/Closed Principle**: The application's architecture allows for extension without modification. New features can be added through inheritance or composition rather than altering existing code.
- **Liskov Substitution Principle**: Subclasses can be substituted for their base classes without affecting the behavior of the program, ensuring compatibility and scalability.
- **Interface Segregation Principle**: Interfaces are tailored to specific client requirements, preventing classes from depending on interfaces they don't use.
- **Dependency Inversion Principle**: High-level modules depend on abstractions rather than concrete implementations, promoting decoupling and flexibility.

By adhering to these principles, the application promotes maintainability, scalability, and code reusability.
