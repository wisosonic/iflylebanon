<?php namespace App\Http\Controllers;

use Auth;
use App\Place;
use App\Rating;
use App\Youtubeapi;
use App\Livestream;

use Illuminate\Support\Facades\Request;

class HomeController extends Controller {

	public function homepage()
	{
		Livestream::updateLiveStreamingStatus();
		$places = Place::all();

		// $actives = Youtubeapi::getActiveBroadcasts();
		// foreach ($actives as $key => $active) {
		// 	$place = $places->where("title", "=",$active->snippet->title)->first();
		// 	if ($place) {
		// 		$place->stremingstatus = true;
		// 	} else {
		// 		$place->stremingstatus = false;
		// 	}
		// }


		$places = $places->sortByDesc('rating')->values();
		$stars = array();
		foreach ($places as $key => $place) {
			$place->long = explode(" ", $place->coordinates)[0];
			$place->lat = explode(" ", $place->coordinates)[1];
			if (Auth::user()&& ! Auth::user()->blacklist()->first()) {
				$user = Auth::user();
            	$favorite_places_ids = $user->favoriteplaces()->pluck("place_id")->toArray();
				if (in_array($place->id, $favorite_places_ids)) {
	                $place->favorite = "green";
	            } else {
	                $place->favorite = "red";
	            }
				$userrating = $user->ratings()->where("place_id",$place->id)->first();
				if ($userrating) {
					$stars[$place->id] = [Rating::getStarsCount($place), str_replace("-", ".", Rating::getStarsCount($place)), $key+1];
				} else {
					$stars[$place->id] = [Rating::getStarsCount($place), 0, $key+1];
				}
			}
			if ($place->livestreams()->count()>0) {
				$place->stremingstatus = true;
				$place->stream_count = $place->livestreams()->count();
			} else {
				$place->stremingstatus = false;
				$place->stream_count = 0;
			}
		}
		return view("homepage", ["places"=>$places, "stars"=>json_encode($stars)]);
	}

}
