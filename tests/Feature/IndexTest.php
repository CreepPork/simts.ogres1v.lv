<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class IndexTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        Artisan::call('app:setup');
    }

    /** @test */
    public function index_page_loads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function great_works_is_visible()
    {
        $response = $this->get('/');

        $response->assertSee('100 labie darbi');
    }
}
