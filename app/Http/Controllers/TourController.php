<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour;

class TourController extends Controller {

	public function getAllTours()
	{
		$tours = Tour::all();

		return view("", ["tours"=>$tours]);
	}

	public function getTour($id)
	{
		$tour = Tour::find($id);
		if ($tour) {
			return view("", ["tour"=>$tour]);
		} else {
			return redirect("/")->with(["message"=>"tournotexists"]);
		}
	}
}