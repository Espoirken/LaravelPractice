<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CancelEvent extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $credits, $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $credits, $title)
    {
        $this->name = $name;
        $this->credits = $credits;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.client.events.email.cancel_event_email');
    }
}
