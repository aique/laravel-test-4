<?php

class PostPrinter
{
    public static function printPost(Post $post)
    {
        $output = '';

        $output .= '<article>';

        $output .= '<h2><a href="/post/' . $post->id . '">' . $post->title . '</a></h2>';

        $output .= '<div class="row">';

        $output .= '<div class="col-sm-6 col-md-6">';
        $output .= '<span class="glyphicon glyphicon-pencil"></span> <a href="/post/' . $post->id . '#comments">' . count($post->comments) . ' comentarios</a> ';
        $output .= '<span class="glyphicon glyphicon-time"></span> ' . Carbon::parse($post->created_at)->toFormattedDateString();
        $output .= '</div>';

        $output .= '</div>';

        $output .= '<hr>';

        $output .= '<img src="http://placehold.it/900x300" class="img-responsive">';

        $output .= '<br />';

        $output .= '<p class="lead">' . $post->resume . '</p>';

        $output .= '<p class="text-right">';
        $output .= '<a href="/post/' . $post->id . '" class="text-right">seguir leyendo...</a>';
        $output .= '</p>';

        $output .= '<hr>';

        $output .= '</article>';

        return $output;
    }

    public static function printPostInDetail(Post $post)
    {
        $output = '';

        $output .= '<div class="row">';

        $output .= '<div class="col-sm-6 col-md-6">';
        $output .= '<span class="glyphicon glyphicon-pencil"></span> <a href="/post/' . $post->id . '#comments">' . count($post->comments) . ' comentarios</a> ';
        $output .= '<span class="glyphicon glyphicon-time"></span> ' . Carbon::parse($post->created_at)->toFormattedDateString();
        $output .= '</div>';

        $output .= '</div>';

        $output .= '<hr>';

        $output .= '<img src="http://placehold.it/1200x400" class="img-responsive">';

        $output .= '<br />';

        $output .= '<p class="lead">' . $post->resume . '</p>';

        $output .= '<p class="content">' . $post->content . '</p>';

        $output .= '<hr>';

        $output .= '<a href="#">← Volver a los posts</a>';

        return $output;
    }
}