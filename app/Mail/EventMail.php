<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Event;
use App\Child;

class EventMail extends Mailable
{
    use Queueable, SerializesModels;
    public $title, $detail, $id, $joinees;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $detail, $id, $joinees)
    {
        $this->title = $title;
        $this->detail = $detail;
        $this->id = $id;
        $this->joinees = $joinees;
        foreach (unserialize($joinees) as $key => $joinee) {
            $children[] = Child::find($joinee);
        }
        $this->joinees = $children;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.client.events.email.create_event_email');
    }
}
