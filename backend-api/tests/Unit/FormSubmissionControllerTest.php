<?php
namespace Tests\Unit;

use App\Http\Controllers\FormSubmissionController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Http\JsonResponse;

class FormSubmissionControllerTest extends TestCase
{
    use DatabaseTransactions;


    public function test_it_returns_success_response_on_valid_submission(): void
    {
        $controller = new FormSubmissionController();
        $request = new Request([
            'full_name' => 'John Smith',
            'email' => 'john@example.com',
            'phone_number' => '1234567890',
            'vehicle_id' => 1,
            'license_type' => 'Full UK',
            'yearly_income' => 80000,
        ]);
    
        // Capture the response returned by the controller method
        $response = $controller->submit($request);
    
        // Assert status code
        $this->assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
    
        // Assert JSON on the captured response
        $this->assertJson($response->getContent());
    }
    

}
