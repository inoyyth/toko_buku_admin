<?php

Route::group(['namespace' => 'App\Modules\Posts\Controllers'], function () {
    Route::get('/posts.html', [
        'uses' => 'PostsController@index'
     ]);
     Route::get('/posts-add.html', [
        'uses' => 'PostsController@add',
     ]);

     Route::get('/posts-edit-{$id}.html', [
        'uses' => 'PostsController@add',
        'where' => array(
            'id' => '[0-9+]'
        )
     ]);
});