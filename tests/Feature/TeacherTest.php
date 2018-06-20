<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    public function all_routes_are_protected_by_auth()
    {
        $this->logout();

        $this->get('/teacher')->assertRedirect('/login');
        $this->get('/teacher/create')->assertRedirect('/login');
        $this->post('/teacher')->assertRedirect('/login');
        $this->get('/teacher/1')->assertRedirect('/login');
        $this->get('/teacher/1/edit')->assertRedirect('/login');
        $this->patch('/teacher/1')->assertRedirect('/login');
        $this->delete('/teacher/1')->assertRedirect('/login');
    }

    /** @test */
    public function index_displays_all_teachers()
    {
        $this->get('/teacher')->assertSee('alert');

        $teacher = $this->create('App\Teacher');

        $this->get('/teacher')->assertDontSee('alert')->assertSee(e($teacher->fullName()));
    }

    /** @test */
    public function creating_a_new_teacher_validation_does_work()
    {
        $this->post('/teacher', [])->assertSessionHasErrors();

        $this->post('/teacher', [
            'first_name' => 'on',
            'last_name' => 'e'
        ])->assertSessionHasErrors();
    }

    /** @test */
    public function a_new_teacher_can_be_created()
    {
        $this->post('/teacher', [
            'first_name' => 'Name',
            'last_name' => 'Surname'
        ])->assertSessionHas('success');

        $this->assertDatabaseHas('teachers', ['first_name' => 'Name']);

        $this->get('/teacher')->assertSee('Name Surname');
    }

    /** @test */
    public function a_teacher_can_be_seen_individually()
    {
        $teacher = $this->create('App\Teacher');

        $this->get('/teacher/' . $teacher->id)->assertSee($teacher->first_name);
    }

    /** @test */
    public function user_can_see_relationship_between_the_teacher_and_a_work()
    {
        $work = $this->create('App\Work');

        $teacher = $work->teacher;

        $this->get('/teacher/' . $teacher->id)
            ->assertSee($work->title)
            ->assertSee($work->status->status);
    }

    /** @test */
    public function when_editing_a_teacher_validation_works()
    {
        $teacher = $this->create('App\Teacher');

        $this->patch('/teacher/' . $teacher->id, [
            'first_name' => 's!',
            'last_name' => 'o'
        ])->assertSessionHasErrors();

        $this->get('/teacher')
            ->assertDontSee('s!')
            ->assertSee($teacher->name);
    }

    /** @test */
    public function a_teacher_can_be_edited()
    {
        $teacher = $this->create('App\Teacher');

        $this->assertDatabaseHas('teachers', ['id' => $teacher->id]);

        $this->get('/teacher')->assertSee($teacher->first_name);

        $this->patch('/teacher/' . $teacher->id, [
            'first_name' => 'New Name',
            'last_name' => $teacher->last_name
        ])->assertSessionHas('success');

        $this->get('/teacher')
            ->assertSee('New Name')
            ->assertDontSee($teacher->first_name)
            ->assertSee($teacher->last_name);
    }

    /** @test */
    public function a_teacher_can_be_deleted()
    {
        $teacher = $this->create('App\Teacher');

        $this->assertDatabaseHas('teachers', ['id' => $teacher->id]);

        $this->get('/teacher')->assertSee($teacher->first_name);

        $this->delete('/teacher/' . $teacher->id)
            ->assertSessionHas('success')
            ->assertSuccessful();

        $this->assertDatabaseMissing('teachers', ['id' => $teacher->id]);

        $this->get('/teacher')->assertDontSee($teacher->first_name);
    }
}
