<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'DashboardController@index'
 ]);

 Route::get('/index.html', [
    'uses' => 'DashboardController@index',
    'where' => array(
        'id' => '[0-9+]'
    )
 ]);

 Route::get('/post.html', [
    'uses' => 'PostController@index'
 ]);

 Route::get('/post-add.html', [
    'uses' => 'PostController@index'
 ]);

 Route::get('/post-edit-{id}.html', [
    'uses' => 'PostController@index',
    'where' => array(
        'id' => '[0-9+]'
    )
 ]);

 Route::post('/post-save.html', [
    'uses' => 'PostController@index'
 ]);

 Route::get('/post-delete-{id}.html', [
    'uses' => 'PostController@index',
    'where' => array(
        'id' => '[0-9+]'
    )
 ]);