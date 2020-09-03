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

Route::get('/c_index', 'ContentsController@c_index' ) ->name('contents.c_index');
Route::get('/create', 'ContentsController@showCreateForm' ) ->name('contents.create');
Route::post('/create', 'ContentsController@create' );
Route::get('/contents/{id}', 'ContentsController@show' ) ->name('contents.show');
Route::get('/contents/{id}/edit', 'ContentsController@edit' ) ->name('contents.edit');
Route::post('/contents/{id}/edit', 'ContentsController@showEditForm' );
Route::post('/contents/{id}/destroy', 'ContentsController@destroy' ) ->name('contents.destroy');
