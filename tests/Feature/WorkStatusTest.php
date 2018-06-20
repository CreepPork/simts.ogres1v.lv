<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WorkStatusTest extends TestCase
{
    /** @test */
    public function all_requests_to_work_status_requires_authencation()
    {
        $status = $this->create('App\WorkStatus');

        $this->get('/workStatus')->assertRedirect('/login');
        $this->get('/workStatus/' . $status->id)->assertRedirect('/login');
        $this->delete('/workStatus/' . $status->id)->assertRedirect('/login');
    }

    /** @test */
    public function other_routes_are_disabled_and_return_404()
    {
        $this->signIn();

        $status = $this->create('App\WorkStatus');

        $this->get('/workStatus/create')->assertStatus(404);
        $this->post('/workStatus', ['status' => 'A status.'])->assertStatus(404);
        $this->get('/workStatus/' . $status->id . '/edit')->assertStatus(404);
        $this->patch('/workStatus/' . $status->id, ['status' => 'Different status.'])->assertStatus(404);
    }

    /** @test */
    public function index_displays_statuses()
    {
        $this->signIn();

        // As app:setup has been run we will see 3 default statuses
        $this->get('/workStatus')->assertSee('Pabeigtie darbi');

        $status = $this->create('App\WorkStatus');

        $this->get('/workStatus')->assertSee($status->status);
    }

    /** @test */
    public function show_displays_status()
    {
        $this->signIn();

        $status = $this->create('App\WorkStatus');

        $this->get('/workStatus/' . $status->id)->assertSee($status->status);
    }

    /** @test */
    public function statuses_can_be_deleted()
    {
        $this->signIn();

        $status = $this->create('App\WorkStatus');

        $this->assertDatabaseHas('work_statuses', ['id' => $status->id]);

        $this->get('/workStatus/' . $status->id)->assertSee($status->status);

        $this->delete('/workStatus/' . $status->id)->assertSessionHas('success');

        $this->assertDatabaseMissing('work_statuses', ['id' => $status->id]);

        $this->get('/workStatus/' . $status->id)->assertDontSee($status->status);
    }

    /** @test */
    public function there_is_a_releationship_between_work_status_and_work()
    {
        $this->signIn();

        $work = $this->create('App\Work');

        $status = $work->status;

        $this->assertDatabaseHas('works', ['id' => $work->id]);
        $this->assertDatabaseHas('work_statuses', ['id' => $status->id]);

        $this->get('/workStatus/' . $status->id)->assertSee($work->title);
    }
}
