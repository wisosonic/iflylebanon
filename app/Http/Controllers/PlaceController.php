<?php namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\Place;

class PlaceController extends Controller {

	public function placeInsert(Request $request)
	{
		$user = Auth::user(); 
		$data = $request->all;
		$newPlace = new Place();
		$newPlace->title=$data['title'];
		$newPlace->department=$data['department'];
		$newPlace->title=$data['coordinates'];
		$newPlace->description=$data['description'];
		$newPlace->rating=$data['rating'];
		$newPlace->user_id=$user->id;
		$newPlace->save();
		
	}

	public function getPlace($slug)
	{
		$place = Place::where("slug",$slug)->first();
		if ($place) {
			$place->long = explode(" ", $place->coordinates)[0]; 
			$place->lat = explode(" ", $place->coordinates)[1];
			$place->commentsurl = "http://iflylebanon.com/location/" . $place->slug ;
			$related = $place->relatedPlaces();
			return view("Places/placedetails", ["place"=>$place, "related"=>$related]);
		}	
	}

	public function getAddNewPlace()
	{
		$user = Auth::user();
		if ($user) {
			return view("Places/addnewplace", ["user_id"=>$user->id]);
		} else {
			return redirect("/");
		}
	}

	public function postAddNewPlace(Request $request)
	{
		dd($request->all());
		$message = Place::addNewPlace($request);
		return redirect("/")->with(["message"=>$message]);
	}

}