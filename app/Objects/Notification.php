<?php

namespace App\Objects;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    
    public function user()
    {
        return $this->belongsTo('App\User','receiver_id','id'); // links this->course_id to courses.id
    }
}
