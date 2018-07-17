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

Route::get("/test1", function() {
	return view("test");
});

Route::get("/test2", function(){
	return view("test2");
});

Route::get("/test3", function(){
	$videos = App\Youtubeapi::getAllChannelBroadcasts();
	dd($videos);
});


Route::get('/', "HomeController@homepage");
Route::get('/location/{slug}', "PlaceController@getPlace");
Route::post('/rate-place', "RatingController@ratePlace");
Route::get('/all-live-streams', "HomeController@allLiveStreams");
Route::get('/add-new-place', "PlaceController@getAddNewPlace");
Route::post('/add-new-place', "PlaceController@postAddNewPlace");


Route::post('/checkemailavailability', "UserController@checkemailavailability");

Auth::routes();

