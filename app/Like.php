<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like';

    public function getUser(){
        return $this->belongsTo('App\User','userId','id');
    }
}
