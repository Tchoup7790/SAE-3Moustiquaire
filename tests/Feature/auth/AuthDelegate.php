<?php

namespace Tests\Feature\auth;

interface AuthDelegate
{
    public function destroyUser(): void;
    public static function getTestUserCredentials(): array;
}
