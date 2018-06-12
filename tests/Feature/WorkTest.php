<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Work;
use App\WorkStatus;

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

    /** @test */
    public function a_work_can_be_created()
    {
        $response = $this->post('/work', [
            'title' => 'A title.',
            'body' => 'A body.',

            'completion' => '',

            'teacher_id' => $this->create('App\Teacher')->id,
            'work_status_id' => WorkStatus::where('status', '=', 'Pabeigtie darbi')->get()->first()->id
        ]);

        $this->assertDatabaseHas('works', [
            'title' => 'A title.'
        ]);

        $work = Work::latest()->first();

        $this->get('/')->assertSee('A title.');
        $this->get('/work')->assertSee('A title.');
        $this->get('/work/' . $work->id)->assertSee('A title.');

        $this->get('/')
            ->assertSee($work->title)
            ->assertSee($work->teacher->fullName());

        $this->get('/work')
            ->assertSee($work->title)
            ->assertSee($work->teacher->fullName());

        $this->get('/work/' . $work->id)
            ->assertSee($work->title)
            ->assertSee($work->teacher->fullName());
    }
}
