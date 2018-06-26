<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IndexTest extends TestCase
{
    use DatabaseMigrations;

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

    /** @test */
    public function all_pages_except_main_index_page_require_auth()
    {
        $this->get('/')->assertStatus(200);

        $this->get('/index')->assertRedirect('/login');
        $this->get('/index/1/edit')->assertRedirect('/login');
        $this->patch('/index/1')->assertRedirect('/login');
        $this->delete('/index/1/image')->assertRedirect('/login');
        $this->delete('/index/1/file')->assertRedirect('/login');
    }

    /** @test */
    public function all_indexes_are_listed()
    {
        $this->signIn();

        $index = $this->create('App\Index');

        $this->get('/index')->assertSee($index->section_title);
    }

    /** @test */
    public function indexes_can_be_edited()
    {
        $this->signIn();

        $index = $this->create('App\Index');

        $this->get('/index/' . $index->id . '/edit')
            ->assertSee($index->section_title);

        $this->patch('/index/' . $index->id, [
            'section' => $index->section,
            'section_title' => 'New Section Title',
            'title' => $index->title,
            'body' => $index->body,
        ])->assertSessionHas('success');

        $this->get('/index')->assertSee('New Section Title');
    }
}
