<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
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

	public function getPlaceInfo($slug)
	{
		$place = Place::where("slug",$slug)->first();
		if ($place) {
			return view("/Place/placedetails", ["place"=>$place]);
		}	
	}

}