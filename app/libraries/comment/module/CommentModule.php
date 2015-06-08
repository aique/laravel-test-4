<?php

class CommentModule
{
    public static function getLastComments()
    {
        $numLatestComments = Config::get('widgets.num_latest_comments');

        return Comment::orderBy('created_at', 'desc')->take($numLatestComments)->get();
    }
}