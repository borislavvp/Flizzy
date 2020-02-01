<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function(){

        return view('admin.index');
    });



    Route::resource('admin/users', 'AdminUsersController',['names'=>[


        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit',
        'update'=> 'admin.users.update',
        'destroy'=> 'admin.users.destroy'

    ]]);


    Route::resource('admin/posts', 'AdminPostController',['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit',
        'update'=> 'admin.posts.update',
        'destroy'=> 'admin.posts.destroy'

    ]]);

    Route::resource('admin/categories', 'AdminCategoriesController',['names'=>[


        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit',
        'update'=> 'admin.categories.update',
        'destroy'=> 'admin.categories.destroy'

    ]]);


    Route::resource('admin/comments', 'PostCommentController',['names'=>[


        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
        'show'=>'admin.comments.show',
        'update'=> 'admin.comments.update',
        'destroy'=> 'admin.comments.destroy'

    ]]);


    Route::resource('admin/comment/replies', 'CommentRepliesController',['names'=>[

        'index'=>'admin.comment.replies.index',
        'create'=>'admin.comment.replies.create',
        'store'=>'admin.comment.replies.store',
        'edit'=>'admin.comment.replies.edit',
        'show'=>'admin.comment.replies.show',
        'update'=> 'admin.comment.replies.update',
        'destroy'=> 'admin.comment.replies.destroy'

    ]]);

});

Route::group(['middleware'=>'auth'],function (){

    Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostController@post']);

    Route::post('/comment','PostCommentController@createComment');

    Route::post('comment/reply','CommentRepliesController@createReply');

    Route::get('/home','AdminPostController@posts');

});

Route::get('google', function () {
    return view('googleAuth');
});
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');