<?php namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller {

	public function checkEmailAvailability(Request $request)
	{
		$data = $request->all();
		$availability = User::checkEmailAvailability($data["email"]);
		if ($availability) {
			return 'false';
		} else {
			return 'true';
		}
	}

	public function getFavoritePlaces()
	{
		$user=Auth::user();
		$places = $user->favoritePlaces()->get();

        foreach ($places as $key => $place) {
            $place->tags =  json_decode($place->tags,true);
        }

		return view("myfavoriteplaces", ["places"=>$places]);
	}

	public function getPlacesYouMayLike()
	{
		$user=Auth::user();
		$allplaces = $user->placeYouMayLike();
		$places = $allplaces[0];
		$tags = $allplaces[1];

        foreach ($places as $key => $place) {
            $place->tags =  json_decode($place->tags,true);
        }

		return view("placesuggestions", ["places"=>$places, "tags"=>$tags]);
	}

	public function postFavoritePlaces(Request $request)
	{
		$data = $request->all();
		array_shift($data);
		$response = User::addToFavoritePlaces($data["placeid"]);
		return $response;
	}

	public function getBookings()
	{
		$user = Auth::user();
		$bookings = $user->bookings()->get();
		dd($bookings);

		return view("", ["bookings"=>$bookings]);
	}

}