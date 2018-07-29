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


Route::domain('{subdomain}.iflylebanon.test')->group(function () {
	
		Route::get('/test-subdomain', function($subdomain) {
	        if ($subdomain == "agency") {
	        	dd($subdomain);
	        }
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

Route::get('/', "HomeController@homepage");
Route::get('/location/{slug}', "PlaceController@getPlace");
Route::post('/rate-place', "RatingController@ratePlace");
Route::get('/all-live-streams', "StreamingController@allLiveStreams");
Route::get('/my-favorite-places', "UserController@getFavoritePlaces");
Route::get('/places-you-may-like', "UserController@getPlacesYouMayLike");
Route::post('/add-to-my-favorite-places', "UserController@postFavoritePlaces");
Route::get('/add-new-place', "PlaceController@getAddNewPlace");
Route::post('/add-new-place', "PlaceController@postAddNewPlace");

Route::post('/checkemailavailability', "UserController@checkemailavailability");
Route::post('/check-live-streaming', "StreamingController@checkLiveStreaming");
Route::post('/search', "SearchController@search");
Route::post('/search-tag', "SearchController@searchTag");
Route::post('/search-tour', "SearchController@searchTour");

Auth::routes();

Route::any('{all}', function($uri)
{
    return redirect("/");
})->where('all', '.*');