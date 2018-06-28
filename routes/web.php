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
	$params=array('eventType' => 'live', 'maxResults' => 25, 'q' => 'afqa', 'type' => 'video', 'part'=>"snippet");

	$youtube = new Madcoda\Youtube\Youtube(array('key' => 'AIzaSyAZMuhMd1c1awtDuM0rhwkdbzOLyomRlgc'));
	// $search = $youtube->getChannelById('UCQedLwrgw<eJ-GgGzH6JywQg');
	$search = $youtube->searchAdvanced($params, true);
	
	dd($search);

});

Route::get("/test2", function(){
	return view("test2");
});

Route::get('/', "HomeController@homepage");
Route::get('/location/{slug}', "PlaceController@getPlace");
Route::post('/rate-place', "RatingController@ratePlace");

Route::post('/checkemailavailability', "UserController@checkemailavailability");

Auth::routes();

