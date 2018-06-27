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

Route::get("/test1", function(){

	$youtube = new Madcoda\Youtube\Youtube(array('key' => 'AIzaSyAZMuhMd1c1awtDuM0rhwkdbzOLyomRlgc'));
	// $search = $youtube->getChannelById('UCQedLwrgw<eJ-GgGzH6JywQg');
	$search = $youtube->searchChannelVideos('afqa', 'UCQedLwrgweJ-GgGzH6JywQg', 50);
	
	dd($search);

});

Route::get('/', "HomeController@homepage");
Route::get('/location/{slug}', "PlaceController@getPlace");
Route::post('/rate-place', "RatingController@ratePlace");

Route::post('/checkemailavailability', "UserController@checkemailavailability");

Auth::routes();

