<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WorkTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_created_work_can_be_seen_on_the_works_page()
    {
        $work = $this->create('App\Work');

        $this->get('/work')->assertSee($work->title);
    }

    /** @test */
    public function three_main_types_of_statuses_can_be_seen_on_the_main_page()
    {
        $response = $this->get('/');

        $response->assertSee('Pabeigtie darbi');
        $response->assertSee('Plānotie darbi');
        $response->assertSee('Pašreizējie darbi');
    }
}
