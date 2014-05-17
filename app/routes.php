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

/* Redirect All users To Home Uri */
Route::get('/', function()
{
	return Redirect::route('home.index');
});

/* Route for url validation and generation */
Route::any('url/{shortened}', function($shortened)
{
	$row = Url::whereShortened($shortened)->first();

	if( is_null($row) ) return Redirect::to('/');

    return Redirect::to($row->url);
})->where('slug', '([A-z\d-\/_.]+)?');

/* Handle Home Request using UrlController */
Route::resource('home', 'UrlController');

