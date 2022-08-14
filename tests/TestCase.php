<?php

declare(strict_types=1);

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null): User
    {
        if (! $user) {
            /** @var User */
            $user = User::factory()->create();
        }

        $this->actingAs($user);

        return $user;
    }
}
