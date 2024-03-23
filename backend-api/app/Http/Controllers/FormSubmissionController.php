<?php

namespace App\Http\Controllers;

use App\Events\FormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormSubmissionController extends Controller
{
    public function submit(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'full_name' => 'required|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|email',
                'phone_number' => 'required|numeric|digits_between:10,13',
                'vehicle_id' => 'required|exists:vehicles,id',
                'license_type' => 'required|in:Full UK,UK with Points,Non UK',
                'yearly_income' => 'required|numeric|min:0|max:1000000',
            ];
            
            // Custom messages for validation
            $messages = [
                'full_name.required' => 'Full name is required',
                'full_name.regex' => 'Full name can only contain letters and spaces',
                'email.required' => 'Email is required',
                'email.email' => 'Invalid email format',
                'phone_number.required' => 'Phone number is required',
                'phone_number.digits' => 'Phone number must be between 10 and 13 digits',
                'vehicle_id.required' => 'Vehicle selection is required',
                'vehicle_id.exists' => 'Selected vehicle does not exist',
                'license_type.required' => 'License type is required',
                'license_type.in' => 'Invalid license type selected',
            ];

            // Perform validation
            $validator = Validator::make($request->all(), $rules, $messages);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            
            // !!note to get event running you will also need to run #php artisan queue:work in the main app directory along with #php artisan serve
            // Trigger event upon successful form submission
            event(new FormSubmitted($request->all()));

            // Return a successful response
            return response()->json(['message' => 'Form submitted successfully'], 200);
        } catch (\Exception $e) {
            // Catch any unexpected errors
            return response()->json(['error' => 'Server Error'], 500);
        }
    }
}
