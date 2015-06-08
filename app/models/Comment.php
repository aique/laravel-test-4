<?php

class Comment extends Eloquent
{
    protected $fillable = array('post', 'name', 'email', 'content');

    public function post()
    {
        return $this->belongsTo('Post');
    }
}