<?php

// Admin
Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function() {
	Route::get('/', "AdminController@index");
	Route::get('/all-agencies', "AdminController@getAllAgencies");
	Route::get('/activate-agency', "AdminController@getActivateAgency");
	Route::post('/activate-agency', "AdminController@postActivateAgency");
	Route::get('/all-admins', "AdminController@getAllAdmins");
	Route::get('/delete-admin/{id}', "AdminController@deleteAdmin");
	Route::get('/add-admin', "AdminController@getAddAdmin");
	Route::post('/add-admin', "AdminController@postAddAdmin");
	Route::get('/all-blacklists', "AdminController@getAllBlacklists");
	Route::get('/delete-blacklist/{id}', "AdminController@deleteBlacklist");
	Route::get('/edit-blacklist/{id}', "AdminController@getEditeBlacklist");
	Route::post('/edit-blacklist/', "AdminController@postEditeBlacklist");
	Route::get('/add-to-blacklist', "AdminController@getAddBlacklist");
	Route::post('/add-to-blacklist', "AdminController@postAddBlacklist");
	Route::get('/all-whitelists', "AdminController@getAllWhitelists");
	Route::get('/add-to-whitelist', "AdminController@getAddWhitelist");
	Route::post('/add-to-whitelist', "AdminController@postAddWhitelist");
});

// Agency
Route::group(['prefix' => 'agency',  'middleware' => 'agency'], function() {
	Route::get('/', "AgencyController@index");
	Route::get('/all-tours', "AgencyController@getAllTours");
	Route::get('/my-tours', "AgencyController@getMyTours");
	Route::get('/tour/{id}', "AgencyController@getTourById");
	Route::get('/add-new-tour', "AgencyController@getAddNewTour");
	Route::post('/add-new-tour', "AgencyController@postAddNewTour");
	Route::get('/all-bookings', "AgencyController@index");

});

Route::get("/test1",function(){
	$res = App\Purify::checkProfanity("hello fucking world fuck");
	dd($res);
});
Route::get("/test2",function(){
	$res = App\Youtubeapi::getBroadcastById("rcy2Jo7enxI");
	dd($res);
});

// Live streaming
Route::get('/all-live-streams', "StreamingController@allLiveStreams");
Route::post('/check-live-streaming', "StreamingController@checkLiveStreaming");

// Tours
Route::get('/all-tours', "TourController@getAllTours");
Route::get('/my-bookings', "UserController@getBookings");
Route::get('/all-tours', "TourController@getAllTours");
Route::get('/tour/{id}', "TourController@getTourById");
Route::get('/book-tour/{id}', "TourController@getBookTour");
Route::post('/book-tour', "TourController@postBookTour");

// Places
Route::get('/location/{slug}', "PlaceController@getPlace");
Route::post('/rate-place', "RatingController@ratePlace");
Route::get('/my-favorite-places', "UserController@getFavoritePlaces");
Route::get('/places-you-may-like', "UserController@getPlacesYouMayLike");
Route::post('/add-to-my-favorite-places', "UserController@postFavoritePlaces");
Route::get('/add-new-place', "PlaceController@getAddNewPlace");
Route::post('/add-new-place', "PlaceController@postAddNewPlace");
Route::post('/comment', "PlaceController@postAddComment");
Route::get('/comment/delete/{id}', "PlaceController@deleteComment");

// Search
Route::post('/search', "SearchController@search");
Route::post('/search-tag', "SearchController@searchTag");
Route::post('/search-tour', "SearchController@searchTour");

// General
Route::post('/checkemailavailability', "UserController@checkEmailAvailability");
Route::get('/', "HomeController@homepage");

Auth::routes();

// Others
Route::any('{all}', function($uri)
{
    return redirect("/");
})->where('all', '.*');