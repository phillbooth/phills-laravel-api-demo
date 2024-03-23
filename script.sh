#!/bin/bash

# Start Laravel development server in the backend-api folder
cd backend-api
php artisan serve &

# Wait for the Laravel server to start
sleep 5

# Start the queue worker in the backend-api folder
php artisan queue:work &

# Start the Express app in the frontend-express folder
cd ../frontend-express
npm start
