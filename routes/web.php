<?php

Route::group(['prefix' => 'agency',  'middleware' => 'agency'], function() {

	Route::get('/', function() {
        
    });

});



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

Route::get("/test4", "UserController@getBookings");

Route::get('/', "HomeController@homepage");
Route::get('/location/{slug}', "PlaceController@getPlace");
Route::post('/rate-place', "RatingController@ratePlace");
Route::get('/all-live-streams', "StreamingController@allLiveStreams");
Route::get('/my-favorite-places', "UserController@getFavoritePlaces");
Route::get('/places-you-may-like', "UserController@getPlacesYouMayLike");
Route::post('/add-to-my-favorite-places', "UserController@postFavoritePlaces");
Route::get('/add-new-place', "PlaceController@getAddNewPlace");
Route::post('/add-new-place', "PlaceController@postAddNewPlace");

Route::post('/checkemailavailability', "UserController@checkEmailAvailability");
Route::post('/check-live-streaming', "StreamingController@checkLiveStreaming");
Route::post('/search', "SearchController@search");
Route::post('/search-tag', "SearchController@searchTag");
Route::post('/search-tour', "SearchController@searchTour");

Auth::routes();

Route::any('{all}', function($uri)
{
    return redirect("/");
})->where('all', '.*');