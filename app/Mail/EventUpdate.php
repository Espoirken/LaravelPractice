<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventUpdate extends Mailable
{
    use Queueable, SerializesModels;
    public $title, $detail, $ended_at, $updated_title, $updated_detail, $updated_ended_at;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $detail, $ended_at, $updated_title, $updated_detail, $updated_ended_at)
    {
        $this->title = $title;
        $this->detail = $detail;
        $this->ended_at = $ended_at;
        $this->updated_title = $updated_title;
        $this->updated_detail = $updated_detail;
        $this->updated_ended_at = $updated_ended_at;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.client.events.email.update_event_email');
    }
}
