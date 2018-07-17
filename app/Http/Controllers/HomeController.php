<?php namespace App\Http\Controllers;

use Auth;
use App\Place;
use App\Youtubeapi;

use Illuminate\Support\Facades\Request;

class HomeController extends Controller {

	public function homepage()
	{
		$places = Place::all()->sortByDesc('rating')->values();
		foreach ($places as $key => $place) {
			$place->long = explode(" ", $place->coordinates)[0]; 
			$place->lat = explode(" ", $place->coordinates)[1];
		}
		$actives = Youtubeapi::getActiveBroadcasts();
		if (count($actives)>0) {
			$livestatus = true;
			$videourl = Youtubeapi::getVideoURLById($actives[0]->id);
		} else {
			$livestatus = false;
			$videourl = "#";
		}
		return view("homepage", ["places"=>$places, "livestatus"=>$livestatus, "videourl"=>$videourl]);
	}

}
