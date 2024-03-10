<?php

namespace Tests\Feature\auth;

use App\Models\User;
use Tests\Feature\auth\AuthDelegate;

class AuthTestUtil implements AuthDelegate
{
    private static array $credentials = [
        'firstname' => 'Test',
        'lastname' => 'Auth',
        'email' => 'test@test.com',
        'password' => 'password',
        'tel' => '0000000000',
    ];

    private User $user;

    public function __construct()
    {
        $this->user=$this->createUser();
    }

    public function destroyUser(): void
    {
        $this->user->forceDelete();
    }

    private function createUser(): User
    {
        return User::create(self::$credentials + ['isAdmin' => false]);
    }

    public static function getTestUserCredentials(): array
    {
        return self::$credentials;
    }
}
