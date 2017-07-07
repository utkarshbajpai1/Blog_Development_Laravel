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
Route::group(['middleware' => ['web']],function(){
	// Authentication Routes
	Auth::routes();
	Route::get('/home', 'HomeController@index');
/*
	Route::get('auth/login' , 'Auth\LoginController@login');
	Route::get('auth/login' , 'Auth\LoginController@sendLoginResponse');
	Route::get('auth/logout' , 'Auth\LoginController@logout');
	//Registratin Routes
	Route::get('auth/register' , 'Auth\RegisterController@register');
*/
	//comment
	Route::post('comments/{post_id}' , [ 'uses' => 'CommentsController@store' , 'as' => 'comments.store' ]);
	Route::get('comments/{id}/edit' , [ 'uses' => 'CommentsController@edit' , 'as' => 'comments.edit' ]);
	Route::put('comments/{id}' , [ 'uses' => 'CommentsController@update' , 'as' => 'comments.update' ]);
	Route::delete('comments/{id}/delete' , [ 'uses' => 'CommentsController@delete' , 'as' => 'comments.delete' ]);
		
	
	//slug 
	Route::get('blog/{slug}' , ['uses' => 'BlogController@getSingle' , 'as' => 'blog.single'])->where('slug' , '[\w\d/-\_]+');
	Route::get('/contact', 'PagesController@getContact');
	Route::get('/about', 'PagesController@getAbout');
	Route::get('/', 'PagesController@getIndex');
	Route::resource('/posts', 'PostController');
	// eq.= route::get('posts.create' , 'PostController@createposts');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
