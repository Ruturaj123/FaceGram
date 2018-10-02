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

Route::group(['middleware' =>['web']],function(){

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [
		'uses'=> 'UserController@getHome',
		'as' => 'home',
		'middleware' => 'guest'
	]);

Route::post('/signup', [
  	'uses' => 'UserController@postSignUp',
  	'as' => 'signup'
  ]);

Route::post('/login', [
	   'uses' => 'UserController@postLogin',
		 'as' => 'login'
	]);

Route::post('/createpost', [
	'uses' => 'PostController@postCreatePost',
	'as' => 'post.create'
]);

Route::get('logout', function()
{
    Auth::logout();
    return Redirect::to('/'); # add a log out message
});

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
