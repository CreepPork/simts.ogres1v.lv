<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Recommendation;

class RecommendationCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The recommendation instance.
     *
     * @var Recommendation
     */
    public $recommendation;

    /**
     * Create a new message instance.
     *
     * @param Recommendation $recommendation
     */
    public function __construct(Recommendation $recommendation)
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
        return $this
            ->from('no-reply@ogresnovads.lv')
            ->subject('Ieteikums Izveidots')
            ->markdown('emails.recommend.created');
    }
}
