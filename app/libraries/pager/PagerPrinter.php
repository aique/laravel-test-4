<?php

class PagerPrinter
{
    public static function printPager($page, $posts, $totalPosts)
    {
        $output = '';

        $output .= '<ul class="pager">';
        $output .= '<li class="previous">';

        if($page > 1)
        {
            $output .= HTML::linkRoute('homePage', '← Anteriores', array($page - 1));
        }

        $output .= '</li>';

        $output .= '<li class="next">';

        if(Config::get('pagination.home.num_posts_per_page') * ($page - 1) + count($posts) < $totalPosts)
        {
            $output .= HTML::linkRoute('homePage', 'Recientes →', array($page + 1));
        }

        $output .= '</li>';
        $output .= '</ul>';

        return $output;
    }
}