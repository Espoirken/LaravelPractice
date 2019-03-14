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
    public $title, $detail, $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $detail, $id)
    {
        $this->title = $title;
        $this->detail = $detail;
        $this->id = $id;
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
