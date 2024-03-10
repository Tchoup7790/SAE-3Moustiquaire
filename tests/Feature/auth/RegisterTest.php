<?php

namespace Tests\Feature\auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use WithoutMiddleware;

    private $utils;

    /**
     * Test if the route to register as get request return 200.
     * Run the 'npm run dev' command without cutting it off, and then
     * run the test is required.
     */
    public function testGetRegister(): void
    {
        $response = $this->get('register');
        $response->assertStatus(200);
    }

    /**
     * Testing if register return a valid status when the data given is correct.
     * To test if the register feature is correct, we will send as 'post' data including
     * firstname, lastname, email, password and tel, to the right URL and check if the
     * status found is 201. 201 mean that the new user has been succesfully created.
     */
    public function testValidRegister(): void
    {
        $response = $this->post('register', AuthTestUtil::getTestUserCredentials()+['_token' => csrf_token(),]);

        // Test if the user has been added to the database
        $this->assertDatabaseHas('users', [
            'email' => 'test@test.com',
        ]);

        $email = AuthTestUtil::getTestUserCredentials()['email'];
        // Remove the added user from the database
        \DB::unprepared("DELETE FROM users WHERE email='$email'");

        $response->assertStatus(201); // Test if the status code is valid

        // Test if the user has been successfully removed
        $this->assertDatabaseMissing('users', [
            'email' => 'test@test.com',
        ]);
    }

    /**
     * Testing if register return an invalid status when the data given is incorrect.
     * To test if the register feature is correct, we will send as 'post' data including
     * firstname, email, password and tel, to the right URL, but the lastname is missing.
     * And check if the status found is 400, Bad Request.
     */
    public function testInvalidData(): void
    {
        $response = $this->post('register', [
            '_token' => csrf_token(),
            'firstname' => 't', // firstname is at least 2 characters
            // Missing lastname
            'email' => 'test@test.com',
            'password' => 'password',
            'tel' => '0000000000',
        ]);
        \DB::unprepared("DELETE FROM users WHERE email='test@test.com'");
        $response->assertStatus(400);
    }

    /**
     * Testing if register return an invalid status when the data given already exists.
     * To test if the register feature is correct, we will send as 'post' data including
     * firstname, lastname, email, password and tel, to the right URL, but the data will
     * be already used by a user in the database. And check if the status found is 400 Bad Request
     */
    public function testAlreadyExists(): void
    {
        $utils = new AuthTestUtil(); // Create test user
        $response = $this->post('register', $utils::getTestUserCredentials()+['_token' => csrf_token(),]); // Create a user using the /register route with same data as the test user
        $utils->destroyUser();
        $response->assertStatus(400); // Assert returned status is 400 Bad Request
    }
}
