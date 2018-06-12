<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Utilities\FactoryHelpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseMigrations;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use FactoryHelpers;
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

        DB::statement('PRAGMA foreign_keys=on;');

        Artisan::call('app:setup');
    }

    protected function signIn($user = null)
    {
        $user = $user ? : $this->create('App\User');

        $this->actingAs($user);

        return $this;
    }
}
