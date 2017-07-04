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


Route::get('/single', function () {
	return view('single');
});
Route::get('/about-us', function () {
	return view('about');
});

Route::get('/contact', function () {
	return view('contact');
});

// Route::get('/archive3', function () {
// 	return view('archive3');
// });
// Route::get('/archive', function () {
// 	return view('archive');
// });
// Route::get('/archive2', function () {
// 	return view('archive2');
// });
// Route::get('/archive1', function () {
// 	return view('archive1');
// });



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{username}', 'ProfilesController@profile');
Route::get('profile/{username}/edit', 'ProfilesController@edit_profile');
Route::post('profile/{id}/edit', 'ProfilesController@post_profile');
//Browse
Route::get('/', 'PostingsController@home');
Route::get('referensi', 'PostingsController@index');
Route::get('tulis-referensi', 'PostingsController@tulis');
Route::post('post-referensi', 'PostingsController@post_referensi');
Route::get('referensi/{id}', 'PostingsController@show_referensi');
Route::get('referensi/{id}/edit', 'PostingsController@edit_referensi');
Route::post('referensi/{id}/edit', 'PostingsController@post_edit');
//route socialita facebook
// Route::get('auth/facebook', ['as' => 'auth/facebook', 'uses' => 'Auth\LoginController@redirectToProvider']);
// Route::get('auth/facebook/callback', ['as' => 'auth/facebook/callback', 'uses' => 'Auth\LoginController@handleProviderCallback']);