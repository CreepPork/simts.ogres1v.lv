<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Recommendation;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecommendationCreated;
use App\Rules\Recaptcha;

class RecommendationTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        app()->singleton(Recaptcha::class, function () {
            return \Mockery::mock(Recaptcha::class, function ($m) {
                $m->shouldReceive('passes')->andReturn(true);
            });
        });
    }

    /** @test */
    public function recommend_create_page_is_visible()
    {
        $response = $this->get('/recommend/create');

        $response->assertSee('Ieteikt');
    }

    /** @test */
    public function creating_a_recommendation_requires_recaptcha_verification()
    {
        unset(app()[Recaptcha::class]);

        $this->post('/recommend', [
            'title' => 'A Title.',
            'body' => 'This is a captcha test.',
            'email' => 'tester@example.com',
            'telephone' => '',
            'attachment' => '',
            'g-recaptcha-response' => 'something'
        ])->assertSessionHasErrors('g-recaptcha-response');
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
            'attachment' => $attachment = UploadedFile::fake()->image('attachment.jpg'),
            'g-recaptcha-response' => 'response'
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
            'attachment' => '',
            'g-recaptcha-response' => 'response'
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
            'attachment' => '',
            'g-recaptcha-response' => 'response'
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
            'attachment' => '',
            'g-recaptcha-response' => 'response'
        ]);

        $this->signIn();

        $this->get('/recommend/' . Recommendation::latest()->first()->id)->assertSee($phone);
    }

    /** @test */
    public function index_show_destroy_methods_require_logged_in_user()
    {
        $this->get('/recommend')->assertRedirect(route('login'));

        $recommendation = $this->create('App\Recommendation');

        $this->get('/recommend/' . $recommendation->id)->assertRedirect(route('login'));

        $this->delete('/recommend/' . $recommendation->id)->assertRedirect(route('login'));
    }

    /** @test */
    public function recommendations_can_be_deleted_and_attachment_is_deleted_too()
    {
        $this->signIn();

        // If this test fails and returns that resource is temporarily unavailable
        // that means that the image failed to generate and the image is generated
        // by http://lorempixel.com which is down and the image generated is empty.
        $recommendation = $this->create('App\Recommendation');

        $this->delete('/recommend/' . $recommendation->id);

        $this->assertTrue(Recommendation::find($recommendation->id) == null);
        $this->assertFileNotExists(Storage::url($recommendation->attachment));
    }

    /** @test */
    public function when_recommendation_is_created_then_email_is_sent()
    {
        Mail::fake();

        $this->post('/recommend', [
            'title' => 'Test title.',
            'body' => 'A body.',
            'email' => 'tester@example.com',
            'telephone' => '',
            'attachment' => '',
            'g-recaptcha-response' => 'response'
        ]);

        Mail::assertQueued(RecommendationCreated::class);
    }
}
