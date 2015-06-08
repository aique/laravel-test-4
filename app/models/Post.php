<?php

class Post extends Eloquent
{
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }
}