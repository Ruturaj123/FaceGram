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

Route::get('/home', 'HomeController@index')->name('home');

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
	'as' => 'post.create',
	'middleware' => 'auth'
]);

Route::get('logout', function()
{
    Auth::logout();
    return Redirect::to('/'); # add a log out message
});

Route::get('/delete-post/{post_id}', [
	'uses' => 'PostController@deletePost',
	'as' => 'post.delete',
	'middleware' => 'auth'
]);

Route::get('/like/{post_id}/{friend_id}', [
	'uses' => 'PostController@increaseLikes',
	'as' => 'post.like',
	'middleware' => 'auth'
]);

Route::get('/comment/{post_id}/{friend_id}', [
	'uses' => 'PostController@comment',
	'as' => 'post.comment',
	'middleware' => 'auth'
]);

Route::get('/fetch-comment/{post_id}', [
	'uses' => 'PostController@fetchComments',
	'as' => 'post.fetchComments',
	'middleware' => 'auth'
]);

Route::get('/search', 'SearchController@index')->name('search');

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/message', 'MessageController@index')->name('message');

Route::get('/send-request/{user_id}/{friend_id}', [
	'uses' => 'UserController@sendRequest',
	'as' => 'user.sendRequest',
	'middleware' => 'auth'
]);

Route::get('/accept-request/{user_id}/{friend_name}', [
	'uses' => 'UserController@acceptRequest',
	'as' => 'user.acceptRequest',
	'middleware' => 'auth'
]);


// Route::get('/notifications/{user_id}', 'UserController@getNotifs')->name('notifications');
Route::get('/notifications/{user_id}', [
	'uses' => 'UserController@getNotifs',
	'as' => 'notifications',
	'middleware' => 'auth'
]);

Route::get('/friend-list/{user_id}', [
	'uses' => 'UserController@friendList',
	'as' => 'friendList',
	'middleware' => 'auth'
]);

Route::get('/send-message/{user_id}/{friend_name}/{message}', [
	'uses' => 'UserController@sendMessage',
	'as' => 'sendMessage',
	'middleware' => 'auth'
]);

Route::get('/get-message/{user_id}/{friend_name}', [
	'uses' => 'UserController@getMessage',
	'as' => 'getMessage',
	'middleware' => 'auth'
]);

Route::get('/load-profile/{friend_id}', [
	'uses' => 'ProfileController@getProfile',
	'as' => 'getProfile',
	'middleware' => 'auth'
]);

Route::get('/update-profile-pic/{input}', [
	'uses' => 'ProfileController@updateProfilePic',
	'as' => 'updateProfilePic',
	'middleware' => 'auth'
]);

});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
