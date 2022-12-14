<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['postId'];

    public function getUser(){
        return $this->belongsTo('App\User','userId','id');
    }
}
