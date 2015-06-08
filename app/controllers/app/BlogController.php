<?php

class BlogController extends BaseController
{

    public function home($page = 1)
    {
        $numPostsPerPage = Config::get('pagination.home.num_posts_per_page');

        $posts = Post::orderBy('created_at')->take($numPostsPerPage)->skip(($page - 1) * $numPostsPerPage)->get();

        $numTotalPosts = DB::table('posts')->count();

        return View::make('app.home', array
        (
            'posts' => $posts,
            'latestPosts' => PostModule::getLastPosts(),
            'latestComments' => CommentModule::getLastComments(),
            'page' => $page,
            'totalPosts' => $numTotalPosts
        ));
    }

    public function postDetail(Post $post)
    {
        return View::make('app.detail', array
        (
            'post' => $post,
            'latestPosts' => PostModule::getLastPosts(),
            'latestComments' => CommentModule::getLastComments()
        ));
    }

    public function addPostComment(Post $post)
    {
        // Para ver ejemplos de validación de formularios consultar el login de la aplicación

        $comment = new Comment();

        $comment->fill(Input::all());

        $comment->post_id = $post->id;

        $comment->save();

        return View::make('app.detail', array
        (
            'post' => $post,
            'latestPosts' => PostModule::getLastPosts(),
            'latestComments' => CommentModule::getLastComments()
        ));
    }
}