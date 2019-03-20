<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Child;

class EventUpdate extends Mailable
{
    use Queueable, SerializesModels;
    public $title, $detail, $ended_at, $joinees, $updated_title, $updated_detail, $updated_ended_at, $updated_joinees;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $detail, $ended_at, $joinees, $updated_title, $updated_detail, $updated_ended_at, $updated_joinees)
    {
        $this->title = $title;
        $this->detail = $detail;
        $this->ended_at = $ended_at;
        $this->joinees = $joinees;
        $this->updated_title = $updated_title;
        $this->updated_detail = $updated_detail;
        $this->updated_ended_at = $updated_ended_at;
        $this->updated_joinees = $updated_joinees;

        if(!empty($joinees)){
            foreach (unserialize($joinees) as $key => $joinee) {
                $children[] = Child::find($joinee);
            }
            $this->joinees = $children;
        }
        $updated_children = [];
        if( !empty($updated_joinees) ){
            foreach ($updated_joinees as $key => $updated_child) {
                $updated_children[] = Child::find($updated_child);
            }
        }        
        $this->updated_joinees = $updated_children;
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
