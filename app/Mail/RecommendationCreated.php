<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecommendationCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recommendation)
    {
        $this->recommendation = $recommendation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Create new variables because $this is not the correct scope in that array below
        $title = $this->recommendation->title;
        $body = $this->recommendation->body;

        return $this
        ->from('no-reply@ogresnovads.lv')
        ->subject('Ieteikums Izveidots')
        ->markdown('emails.recommend.created', [
            'title' => $title,
            'body' => $body
        ]);
    }
}
