<?php

class CommentTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->delete();

        $users = User::all();
        $posts = Post::all();

        if(count($users) > 0 && count($posts) > 0)
        {
            for($i = 1; $i < 40; $i++)
            {
                $user = $users[rand(0, count($users) - 1)];
                $post = $posts[rand(0, count($posts) - 1)];
                
                Comment::create(array
                (
                    'content' => 'Comentario de ' . $user->first_name . ' para el post de ' . $post->user->email,
                    'post_id' => $post->id,
                    'name' => $user->first_name,
                    'email' => $user->email
                ));
            }
        }
    }
}