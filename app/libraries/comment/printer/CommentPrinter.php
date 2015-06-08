<?php

class CommentPrinter
{
    public static function printPostComments(Post $post)
    {
        $output = '';

        if(count($post->comments) > 0)
        {
            foreach($post->comments as $comment)
            {
                $output .= '<article class="comment">';
                $output .= '<h1>' . $comment->name . '</h1>';
                $output .= '<span class="details">' . Carbon::parse($comment->created_at)->toFormattedDateString() . '</span>';
                $output .= '<p>' . $comment->content . '</p>';
                $output .= '</article>';
            }
        }

        return $output;
    }

    public static function printNewCommentForm(Post $post)
    {
        $output = '';

        $output .= '<div id="comments" class="well new-comment-form">';

        $output .= '<h4>Deja un comentario</h4>';

        $output .= '<form method="post" action="' . URL::route('addPostComment', $post->id) . '" role="form" class="clearfix">';

        $output .= '<div class="col-md-6 form-group">';
        $output .= '<input placeholder="Nombre" class="form-control" type="text" name="name" id="name" />';
        $output .= '</div>';

        $output .= '<div class="col-md-6 form-group">';
        $output .= '<input placeholder="Correo electrónico" class="form-control" type="email" name="email" id="email" />';
        $output .= '</div>';

        $output .= '<div class="col-xs-12 form-group">';
        $output .= '<label class="sr-only" for="email">Comentario</label>';
        $output .= '<textarea class="form-control" name="content" id="content" placeholder="Comentario"></textarea>';
        $output .= '</div>';

        $output .= '<div class="col-xs-12 form-group text-right">';
        $output .= '<button type="submit" class="btn btn-primary">Enviar</button>';
        $output .= '</div>';

        $output .= '</form>';

        $output .= '</div>';

        return $output;
    }
}