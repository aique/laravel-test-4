<?php

class WidgetPrinter
{
    public static function printSubscribeWidget()
    {
        $output = '';

        $output .= '<div class="well text-center">';
        $output .= '<p class="lead">No te quieres perder nada?<br />Suscríbete a nuestro blog</p>';
        $output .= '<button class="btn btn-primary btn-lg">Suscribirse</button>';
        $output .= '</div>';

        return $output;
    }

    public static function printLatestPostsWidget($latestPosts)
    {
        $output = '';

        if(count($latestPosts) > 0)
        {
            $output .= '<div class="panel panel-default">';
            $output .= '<div class="panel-heading"><h4>Últimos Posts</h4></div>';
            $output .= '<ul class="list-group">';

            foreach($latestPosts as $latestPost)
            {
                $output .= '<li class="list-group-item"><a href="/post/' . $latestPost->id . '">' . $latestPost->title . '</a></li>';
            }

            $output .= '</ul>';
            $output .= '</div>';
        }

        return $output;
    }

    public static function printLatestCommentsWidget($latestComments)
    {
        $output = '';

        if(count($latestComments) > 0)
        {
            $output .= '<div class="panel panel-default">';
            $output .= '<div class="panel-heading"><h4>Comentarios recientes</h4></div>';
            $output .= '<ul class="list-group">';

            foreach($latestComments as $latestComment)
            {
                $output .= '<li class="list-group-item"><a href="#">' . $latestComment->content . ' - <em>' . $latestComment->email . '</em></a></li>';
            }

            $output .= '</ul>';
            $output .= '</div>';
        }

        return $output;
    }
}