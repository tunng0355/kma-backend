<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['id'];

    public function getComment(){
        return $this->hasMany('App\Comment','postId','id');
    }

    public function getLike(){
        return $this->hasMany('App\Like','postId','id');
    }

    public function getSubject(){
        return $this->belongsTo('App\Subject','subjectId','id');
    }

    public function getUser(){
        return $this->belongsTo('App\User','userId','id');
    }
}
