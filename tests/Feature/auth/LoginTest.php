<?php

namespace Tests\Feature\auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use WithoutMiddleware;

    private $utils;

    /**
     * Test if the route to login as get request return 200.
     * Run the 'npm run dev' command without cutting it off, and then
     * run the test is required.
     */
    public function testGetLogin(): void
    {
        $response = $this->get('login');
        $response->assertStatus(200);
    }

    /**
     * Testing if login return a valid status when user email and password are correct.
     * To test if the login feature is correct, we will send as 'post' data including email
     * and password to the right URL and check if the status found is 200. 200 mean that the
     * login was succesfully completed.
     */
    public function testValidLogin()
    {
        // Create a test user
        $this->utils = new AuthTestUtil();

        // Get the test user's credentials
        $cred = $this->utils::getTestUserCredentials();

        // Send data to login
        $response = $this->post('login', [
            '_token' => csrf_token(),
            'email' => $cred['email'],
            'password' => $cred['password'],
        ]);

        // Delete the test user
        $this->utils->destroyUser();

        $response->assertStatus(200); // Assert the status is 200 which is the correct one
    }

    /**
     * Testing if login return an invalid status when user email and password are uncorrect.
     * To test if the login feature with invalid credentials return the correct status code, we
     * will send as 'post' data including a wrong email and password to the right URL and check
     * if the status found is 401. 401 mean 'Unauthorized', the data sent was right but
     * the server did not find the user or the password was invalid.
     */
    public function testInvalidLogin(): void
    {
        // Send data to login
        $response = $this->post('login', ['_token' => csrf_token(), 'email' => 'test@test.com', 'password' => 'test']);

        $response->assertStatus(401); // Assert the status is 401 which is the correct one
    }

    /**
     * Testing if login return an invalid status when user data sent is incorrect.
     * To test if the login feature with invalid data return the correct status code,
     * we will send as 'post' data including a wrong email and password to the right URL
     * and check if the status found is 400. 400 means bad request.
     */
    public function testInvalidData(): void
    {
        $response = $this->post('login', ['_token' => csrf_token(), 'email' => '', 'pass' => '']);

        $response->assertStatus(400);
    }
}
