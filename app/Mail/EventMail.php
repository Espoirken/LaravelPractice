<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Event;

class EventMail extends Mailable
{
    use Queueable, SerializesModels;
    public $title, $detail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $detail)
    {
        $this->title = $title;
        $this->detail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.client.events.email');
    }
}
