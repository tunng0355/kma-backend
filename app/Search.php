<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'search';
    public $timestamps = false;

    public function getUser(){
        return $this->belongsTo('App\User','userId','id');
    }
}
