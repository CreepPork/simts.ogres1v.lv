<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Utilities\FactoryHelpers;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use FactoryHelpers;

    protected function signIn($user = null)
    {
        $user = $user ? : $this->create('App\User');

        $this->actingAs($user);

        return $this;
    }
}
