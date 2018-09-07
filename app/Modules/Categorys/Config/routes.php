<?php

Route::group(['namespace' => 'App\Modules\Categorys\Controllers', 'middleware' => 'web'], function () {
    Route::get('/category.html', [
        'uses' => 'CategorysController@index'
     ]);
     Route::get('/category-add.html', function() {
         $data['title'] = 'Add Category';
        return view('Categorys::add')->with(compact('data'));;
     });

     Route::get('/category-edit-{id}.html', [
        'uses' => 'CategorysController@edit',
        'where' => array(
            'id' => '[0-9]+'
        )
     ]);

     Route::delete('/category-delete-{id}.html', [
        'uses' => 'CategorysController@delete',
        'where' => array(
            'id' => '[0-9]+'
        )
     ]);

     Route::post('/category-save.html', [
        'uses' => 'CategorysController@save'
     ]);

     Route::post('/categorys-data.html', [
        'uses' => 'CategorysController@index'
     ]);
});