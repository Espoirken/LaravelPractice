<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function events(){
        return $this->belongsToMany('App\Event')->withTimestamps()->withPivot('event_id', 'attend');
    }
}
