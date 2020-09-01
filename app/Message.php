<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    const UPDATED_AT = null;

    public function getUser(){
        return $this->belongsTo('App\User','user_id','id');
    }

}
