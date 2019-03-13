<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function children(){
        return $this->belongsToMany('App\Child')->withTimestamps()->withPivot('child_id', 'attend');
    }

    protected $dates = ['ended_at'];

}
