<?php namespace App\Http\Controllers;

use Auth;
use App\Place;
use App\Youtubeapi;

use Illuminate\Support\Facades\Request;

class HomeController extends Controller {

	public function homepage()
	{
		$actives = Youtubeapi::getActiveBroadcasts();
		$places = Place::all();
		foreach ($actives as $key => $active) {
			$place = $places->where("title", "=",$active->snippet->title)->first();
			if ($place) {
				$place->stremingstatus = true;
			} else {
				$place->stremingstatus = false;
			}
		}

		$places = $places->sortByDesc('rating')->values();
		
		foreach ($places as $key => $place) {
			$place->long = explode(" ", $place->coordinates)[0]; 
			$place->lat = explode(" ", $place->coordinates)[1];
		}

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
