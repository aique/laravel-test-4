<?php

class PostModule
{
    public static function getLastPosts()
    {
        $numLatestPosts = Config::get('widgets.num_latest_posts');

        return Post::orderBy('created_at', 'desc')->take($numLatestPosts)->get();
    }
}