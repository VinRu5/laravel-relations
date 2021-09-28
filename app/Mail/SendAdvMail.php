<?php

namespace App\Mail;

use App\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAdvMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $article;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $article = $this->article;
        return $this->from($article->author->email)->subject('Nuovo Articolo')->view('layouts.mail', compact('article'));
    }
}
