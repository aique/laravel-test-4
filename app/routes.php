<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::model('user','User');
Route::model('post','Post');

/*******
 * APP *
 *******/

Route::get('/', array('as' => 'home', 'uses' => 'BlogController@home'));
Route::get('/page/{page}', array('as' => 'homePage', 'uses' => 'BlogController@home'))->where('page', '\d+');
Route::get('/post/{post}', array('as' => 'postDetail', 'uses' => 'BlogController@postDetail'));
Route::post('/post/{post}/comment', array('as' => 'addPostComment', 'uses' => 'BlogController@addPostComment'));

/*******
 * CMS *
 *******/

Route::get('/cms/login', array('as' => 'cmsLogin', 'uses' => 'CmsController@login'));
Route::post('/cms/login', array('as' => 'doCmsLogin', 'uses' => 'CmsController@doLogin'));

Route::group(array('before' => 'cmsAdminLogged'), function()
{
    Route::get('/cms', array('as' => 'cmsHome', 'uses' => 'CmsController@home'));

    Route::get('/cms/logout', array('as' => 'cmsLogout', 'uses' => 'CmsController@logout'));

    /*********
     * Posts *
     *********/

    Route::any('/cms/posts/list/{field?}/{order?}', array('as' => 'cmsPosts', 'uses' => 'PostController@all'))
        ->where('field', '\w+')
        ->where('order', 'asc|desc');

    Route::get('/cms/posts/detail/{post}', array('as' => 'cmsPostDetail', 'uses' => 'PostController@detail'));

    Route::get('/cms/comment/list', array('as' => 'cmsComments', 'uses' => 'CommentController@all'));
});

Route::group(array('before' => 'cmsSuperAdminLogged'), function()
{
    /************
     * Usuarios *
     ************/

    Route::get('/cms/user/list/{field?}/{order?}', array('as' => 'cmsUsers', 'uses' => 'UserController@all'))
        ->where('field', '\w+')
        ->where('order', 'asc|desc');

    Route::get('/cms/user/detail/{user}', array('as' => 'cmsUserDetail', 'uses' => 'UserController@detail'));
    Route::get('/cms/user/edit/{user}', array('as' => 'cmsUserEdit', 'uses' => 'UserController@edit'));
    Route::post('/cms/user/edit/{user}', array('as' => 'cmsUserEdit', 'uses' => 'UserController@doEdit'));
    Route::get('/cms/user/delete/{id}', array('as' => 'cmsUserDelete', 'uses' => 'UserController@delete'))->where('id', '\d+');

    Route::get('/cms/user/{id}/posts/{field?}/{order?}', array('as' => 'cmsUserPosts', 'uses' => 'PostController@userPosts'))
        ->where('id', '\d+')
        ->where('field', '\w+')
        ->where('order', 'asc|desc');
});