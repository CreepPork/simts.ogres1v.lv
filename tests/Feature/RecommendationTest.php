<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Recommendation;

class RecommendationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function recommend_create_page_is_visible()
    {
        $response = $this->get('/recommend/create');

        $response->assertSee('Ieteikt');
    }

    /** @test */
    public function create_recommendation_with_attachment()
    {
        Storage::fake('public');

        $response = $this->post('/recommend', [
            'title' => 'Attachment Title.',
            'body' => 'This is a attachment test.',
            'email' => 'tester@example.com',
            'telephone' => '',
            'attachment' => $attachment = UploadedFile::fake()->image('attachment.jpg')
        ]);

        $this->signIn();

        // Check if exists in DB
        $this->assertEquals('recommend/' . $attachment->hashName(), Recommendation::latest()->first()->attachment);

        // Check if the file link is correct in the user's page
        $this->get('/recommend/' . Recommendation::latest()->first()->id)->assertSee($attachment->hashName());

        // Check if the file exists as a file
        Storage::disk('public')->assertExists('recommend/' . $attachment->hashName());
    }

    /** @test */
    public function create_recommendation_with_email_and_telephone()
    {
        $title = 'Both Title.';

        $response = $this->post('/recommend', [
            'title' => $title,
            'body' => 'This is a body.',
            'email' => 'tester@example.com',
            'telephone' => '12345678',
            'attachment' => ''
        ]);

        $this->signIn();

        $this->get('/recommend')->assertSee($title);
    }

    /** @test */
    public function create_recommendation_with_only_email()
    {
        $email = 'tester@example.com';

        $response = $this->post('/recommend', [
            'title' => 'Email title.',
            'body' => 'This is a body.',
            'email' => $email,
            'telephone' => '',
            'attachment' => ''
        ]);

        $this->signIn();

        $this->get('/recommend/' . Recommendation::latest()->first()->id)->assertSee($email);
    }

    /** @test */
    public function create_recommendation_with_only_telephone()
    {
        $phone = '12345678';

        $response = $this->post('/recommend', [
            'title' => 'Email title.',
            'body' => 'This is a body.',
            'email' => '',
            'telephone' => $phone,
            'attachment' => ''
        ]);

        $this->signIn();

        $this->get('/recommend/' . Recommendation::latest()->first()->id)->assertSee($phone);
    }

    /** @test */
    public function index_show_destroy_methods_require_logged_in_user()
    {
        $this->get('/recommend')->assertRedirect(route('login'));

        $recommendation = create('App\Recommendation');

        $this->get('/recommend/' . $recommendation->id)->assertRedirect(route('login'));

        $this->delete('/recommend/' . $recommendation->id)->assertRedirect(route('login'));
    }

    /** @test */
    public function recommendations_can_be_deleted_and_attachment_is_deleted_too()
    {
        $this->signIn();

        $recommendation = create('App\Recommendation');

        $this->delete('/recommend/' . $recommendation->id);

        $this->assertTrue(Recommendation::find($recommendation->id) == null);
        $this->assertFileNotExists(Storage::url($recommendation->attachment));
    }
}
