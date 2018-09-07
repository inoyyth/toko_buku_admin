<?php

Route::group(['namespace' => 'App\Modules\Tags\Controllers'], function () {
    Route::get('/tag.html', [
        'uses' => 'TagsController@index'
     ]);
     Route::get('/tag-add.html', [
        'uses' => 'TagsController@add',
     ]);

     Route::get('/tag-edit-{$id}.html', [
        'uses' => 'TagsController@edit',
        'where' => array(
            'id' => '[0-9+]'
        )
     ]);
});