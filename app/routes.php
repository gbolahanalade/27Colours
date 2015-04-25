<?php

/*
|-------------------------------------------------------------------------
| Application Routes
|-------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::model('user','User');
Route::model('blog','Blog');
Route::model('song','Song');
Route::model('gallery', 'Gallery');
Route::model('video', 'Video');
Route::get('/', 'HomeController@index');


Route::get('/song', 'SongController@index');
Route::get('/videos', 'VideoController@index');
Route::get('/galleries', 'GalleryController@index');
Route::get('/talents', 'TalentController@index');


Route::get('blog/{id}', 'BlogController@index');
Route::get('/blog/{blog}/show', 'BlogController@showBlog');


Route::get('/song/upload', 'SongController@getNew');
Route::get('/song/upload2', 'SongController@getNew2');
Route::post('/song/create', 'SongController@postCreate');
Route::post('/song/art/create', 'SongController@postArtCreate');
Route::get('/song/delete/{song}', 'SongController@delete');
Route::post('/song/delete', 'SongController@doDelete');
Route::get('/song/edit/{song}', 'SongController@edit');
Route::post('/song/edit', 'SongController@doEdit');
Route::get('/song/show/{song}', 'SongController@showSong');
Route::get('/search/song', 'SongController@search');

Route::get('/editSong', 'SongController@editSong');
Route::post('/updateSong', 'SongController@updateSong');

Route::get('/gallery/upload', 'GalleryController@getNew');
Route::post('/gallery/create', 'GalleryController@postCreate');
Route::get('/gallery/delete/{gallery}', 'GalleryController@delete');
Route::post('/gallery/delete/', 'GalleryController@doDelete');
Route::get('/gallery/edit/{gallery}', 'GalleryController@edit');
Route::post('/gallery/edit/', 'GalleryController@doEdit');
ROute::get('/gallery/show/{gallery}', 'GalleryController@showGallery');
Route::get('/search/gallery', 'GalleryController@search');

Route::get('/editGallery', 'GalleryController@editGallery');
Route::post('/updateGallery', 'GalleryController@updateGallery');

Route::get('/video/upload', 'VideoController@getNew');
Route::get('/video/upload2', 'VideoController@getNew2');
Route::post('/video/create','VideoController@postCreate');

Route::post('/video/art/create', 'VideoController@postArtCreate');
Route::get('/video/show/{video}', 'VideoController@showVideo');
Route::get('/video/delete/{video}', 'VideoController@delete');
Route::post('/video/delete', 'VideoController@doDelete');
Route::get('/video/edit/{video}', 'VideoController@edit');
Route::post('/video/edit', 'VideoController@doEdit');
Route::get('/search/video', 'VideoController@search');



Route::get('/profile', ['as'=> 'profile', 'uses' =>'ProfileController@index']);
Route::get('/privacyPolicy', 'ProfileController@privacyPolicy');
Route::get('/user/show/{id}', 'ProfileController@show');
Route::get('/profile/notice', ['as'=>'notice', 'uses' => 'ProfileController@notice']);
Route::get('/profile/edit',  'ProfileController@edit');
Route::post('/profile/edit', 'ProfileController@doEdit');
Route::get('/profile/photo/upload', 'ProfileController@getPhoto');
Route::post('/profile/upload', 'ProfileController@doGetPhoto');
//Route::get('/profile',['as'=> 'profile.single', 'uses' =>'ProfileController@getSingle']);


// Confide routes
Route::get('users/register',['as'=> 'register', 'uses' =>'UsersController@getCreate']);
Route::post('users', 'UsersController@postCreate');
Route::get('users/login', ['as'=>'login', 'uses'=> 'UsersController@getLogin']);
Route::post('users/login', 'UsersController@postLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@getForgotPassword');
Route::post('users/forgot_password', 'UsersController@postForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@getResetPassword');
Route::post('users/reset_password', 'UsersController@postResetPassword');
Route::get('users/logout', ['as' => 'logout', 'uses' => 'UsersController@getLogout']);

Route::get('/upload', 'UploadController@index');


Route::get('users/login/fb', ['as' => 'fblogin', 'uses'=> 'HomeController@loginWithFacebook']);
Route::get('users/login/go', ['as' => 'gologin', 'uses'=> 'HomeController@loginWithGoogle']);
