<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
//Route::get('users', 'HomeController@showWelcome');
Route::any('users/login', array('as' => 'userLogin', 'uses' => 'UsersController@login'));
Route::post('users/register', array('as' => 'userSave', 'uses' => 'UsersController@store'));

Route::resource('users', 'UsersController');

Route::resource('tweets', 'TweetsController');

Route::resource('campaigns', 'CampaignsController');