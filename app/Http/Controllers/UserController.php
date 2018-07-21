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
		return view("myfavoriteplaces", ["places"=>$places]);
	}

	public function postFavoritePlaces(Request $request)
	{
		$data = $request->all();
		array_shift($data);
		$response = User::addToFavoritePlaces($data["placeid"]);
		return $response;
	}

}