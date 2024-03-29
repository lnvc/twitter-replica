<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');
Auth::routes();

// Route::get('{any}', 'HomeController@index');

Route::redirect('/', 'home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/tweet', 'TweetController@store');
Route::get('/follow/{id}', 'FollowingController@follow');
Route::get('/unfollow/{id}', 'FollowingController@unfollow');
Route::post('/like', 'TweetController@like');
Route::post('/retweet', 'TweetController@retweet');
Route::delete('/delete/{id}', 'TweetController@destroy');
Route::get('/settings/profile', 'ProfileController@edit')->middleware('auth');
Route::put('/updateprofile', 'ProfileController@update');
Route::get('/{user}/status/{tweet_id}', 'TweetController@show');

// spa
Route::get('/{user}/following', 'ProfileController@displayfollow');
//  function() {
//     $f = 'Following';
//     return view('follow_page', compact('f'));
// });
Route::get('/{user}/followers', 'ProfileController@displayfollow');
//  function() {
//     $f = 'Followers';
//     return view('follow_page', compact('f'));
// });

Route::get('/{user}', 'ProfileController@index')->name('profile');
