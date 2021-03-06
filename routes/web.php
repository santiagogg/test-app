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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::resource('videos', 'VideoController');
Route::get('videos/{id}/metadata', 'MetadataController@edit')->name('videos.metadata.edit');
Route::post('videos/{id}/metadata', 'MetadataController@update')->name('videos.metadata.update');
Route::post('videos/{id}/likes', 'LikesController@store')->name('videos.likes.store');
Route::delete('videos/{id}/likes', 'LikesController@destroy')->name('videos.likes.delete');
Route::get('/home', function () {
    return redirect(route('videos.index'));
});
