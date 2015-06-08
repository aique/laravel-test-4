<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users_groups')->delete();
        DB::table('groups')->delete();
        DB::table('users')->delete();

        $superAdminGroup = Sentry::getGroupProvider()->create(array
        (
            'name' => 'SuperAdmins',
            'permissions' => array
            (
                'superadmin'      => 1,
                'admin'           => 1,
                'posts.write'     => 1,
                'comment.read'    => 1,
                'comment.write'   => 1
            )
        ));

        $adminGroup = Sentry::getGroupProvider()->create(array
        (
            'name' => 'Admins',
            'permissions' => array
            (
                'superadmin'      => 0,
                'admin'           => 1,
                'posts.write'     => 1,
                'comment.read'    => 1,
                'comment.write'   => 1
            )
        ));

        $authorGroup = Sentry::getGroupProvider()->create(array
        (
            'name' => 'Authors',
            'permissions' => array
            (
                'superadmin'      => 0,
                'admin'           => 0,
                'posts.write'     => 1,
                'comment.read'    => 1,
                'comment.write'   => 1
            )
        ));

        $userGroup = Sentry::getGroupProvider()->create(array
        (
            'name' => 'Users',
            'permissions' => array
            (
                'superadmin'      => 0,
                'admin'           => 0,
                'posts.write'     => 0,
                'comment.read'    => 1,
                'comment.write'   => 0
            )
        ));

        $user = Sentry::createUser(array('email' => 'aique@test.com', 'password' => 'aique', 'first_name' => 'aique', 'activated' => '1'));
        $user->addGroup($superAdminGroup);

        $user = Sentry::createUser(array('email' => 'marco@test.com', 'password' => 'marco', 'first_name' => 'marco', 'activated' => '1'));
        $user->addGroup($adminGroup);

        $user = Sentry::createUser(array('email' => 'ana@test.com', 'password' => 'ana', 'first_name' => 'ana', 'activated' => '1'));
        $user->addGroup($authorGroup);

        $user = Sentry::createUser(array('email' => 'raquel@test.com', 'password' => 'raquel', 'first_name' => 'raquel', 'activated' => '1'));
        $user->addGroup($authorGroup);

        $user = Sentry::createUser(array('email' => 'paco@test.com', 'password' => 'paco', 'first_name' => 'paco', 'activated' => '1'));
        $user->addGroup($userGroup);
    }
}