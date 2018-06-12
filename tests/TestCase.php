<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Utilities\FactoryHelpers;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use FactoryHelpers;

    protected function setUp()
    {
        parent::setUp();

        DB::statement('PRAGMA foreign_keys=on;');
    }

    protected function signIn($user = null)
    {
        $user = $user ? : $this->create('App\User');

        $this->actingAs($user);

        return $this;
    }
}
