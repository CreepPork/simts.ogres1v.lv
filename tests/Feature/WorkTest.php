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
        $this->signIn();

        $response = $this->post('/work', [
            'title' => 'A title.',
            'body' => 'A body.',

            'completed_at' => '',

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

    /** @test */
    public function a_work_can_be_deleted()
    {
        $this->signIn();

        $work = $this->create('App\Work', ['title' => 'New title.']);

        $this->assertDatabaseHas('works', ['title' => 'New title.']);

        $this->delete('/work/' . $work->id)->assertStatus(200)->assertSessionHas('success', 'Darbs izdzēsts.');

        $this->assertDatabaseMissing('works', ['title' => 'New title.']);
    }

    /** @test */
    public function work_completed_at_date_appears_if_present()
    {
        $workWithoutCompletion = $this->create('App\Work', ['completed_at' => null]);

        $this->get('/work/' . $workWithoutCompletion->id)->assertDontSee('Plānots pabeigt');

        $workWithCompletion = $this->create('App\Work');

        $this->get('/work/' . $workWithCompletion->id)->assertSee($workWithCompletion->completed_at->diffForHumans());
    }

    /** @test */
    public function if_user_is_logged_in_they_can_see_the_delete_button()
    {
        $work = $this->create('App\Work');

        $this->get('/work/' . $work->id)->assertDontSee('Dzēst');

        $this->signIn();

        $this->get('/work/' . $work->id)->assertSee('Dzēst');
    }

    /** @test */
    public function a_work_can_be_edited()
    {
        $this->signIn();

        $work = $this->create('App\Work');

        $this->assertDatabaseHas('works', ['id' => $work->id]);

        $this->get('/work')->assertSee($work->title);

        $this->patch('/work/' . $work->id, [
            'title' => 'My new title.',
            'body' => $work->body,

            'completed_at' => '', // set it to '' so we don't have to mess with date conversion from Carbon to Carbon, etc.

            'teacher_id' => $work->teacher_id,
            'work_status_id' => $work->work_status_id
        ]);

        $this->assertDatabaseHas('works', ['title' => 'My new title.']);

        $this->get('/work')->assertSee('My new title.');
    }

    /** @test */
    public function create_store_update_and_destroy_methods_require_authencation()
    {
        $this->get('/work/create')->assertRedirect('/login');
        $this->post('/work')->assertRedirect('/login');
        $this->patch('/work/1')->assertRedirect('/login');
        $this->delete('/work/1')->assertRedirect('/login');
    }

    /** @test */
    public function index_and_show_methods_do_not_require_authencation_to_view()
    {
        $work = $this->create('App\Work');

        $this->get('/work')->assertStatus(200);
        $this->get('/work/' . $work->id)->assertStatus(200);
    }
}
