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

Route::group(['middleware' => 'auth'], function () {
Route::get('/profile-create',"ProfileController@ProfileCreate");
Route::post('/profile-create',"ProfileController@ProfileStore");
Route::get('/',"NoteController@index");
Route::get('/notepad',"NoteController@notebooks");
Route::get('/create',"NoteController@create");
Route::post('/notes/create',"NoteController@NoteStore");
Route::get('/notes/edit/{id}',"NoteController@NoteEdit");
Route::get('/notes/delete/{id}',"NoteController@NoteDelete");
Route::post('/notes/update/{id}',"NoteController@NoteUpdate");
Route::get('/notes/show/{id}',"NoteController@FullNote");
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::post('/profile/picture/{id}',"ProfileController@pictureUpload");
Route::resource('profile', 'ProfileController');
});