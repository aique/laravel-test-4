<?php

class PostTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->delete();

        Eloquent::unguard(); // Esta instrucción evita el bloqueo masivo para hacer inserciones masivas como la que se hará más abajo

        $authorsGroup = Sentry::findGroupByName('Authors');
        $authors = Sentry::findAllUsersInGroup($authorsGroup);

        if(count($authors) > 0)
        {
            $author = $authors[0];

            for($i = 1; $i < 20; $i++)
            {
                Post::create(array
                (
                    'title' => 'Post número ' . $i . ' escrito por Ana',
                    'resume' => 'Pequeño resúmen del post',
                    'content' => 'Chanante ipsum dolor sit amet, tunante eveniet ut exercitation nisi. Ut mangurrián chotera aliqua tontiploster ullamco tempor. Incididunt cascoporro veniam, melifluo adipisicing nisi eiusmod veniam exercitation veniam ad enim ex.',
                    'user_id' => $author->id,
                ));
            }

            $author = $authors[1];

            for($i = 1; $i < 20; $i++)
            {
                Post::create(array
                (
                    'title' => 'Post número ' . $i . ' escrito por Raquel',
                    'resume' => 'Pequeño resúmen del post',
                    'content' => 'Chanante ipsum dolor sit amet, tunante eveniet ut exercitation nisi. Ut mangurrián chotera aliqua tontiploster ullamco tempor. Incididunt cascoporro veniam, melifluo adipisicing nisi eiusmod veniam exercitation veniam ad enim ex.',
                    'user_id' => $author->id,
                ));
            }
        }
    }
}