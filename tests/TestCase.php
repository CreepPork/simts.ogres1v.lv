<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
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

    protected function logout($user = null)
    {
        Auth::logout();
    }

    protected function create($class, $attributes = [], $times = null)
    {
        return factory($class, $times)->create($attributes);
    }

    protected function make($class, $attributes = [], $times = null)
    {
        return factory($class, $times)->make($attributes);
    }
}
