<?php namespace App\Http\Controllers;

use Auth;
use App\Place;
use App\Youtubeapi;

use Illuminate\Support\Facades\Request;

class HomeController extends Controller {

	public function homepage()
	{
		$places = Place::all()->sortByDesc('rating')->values();
		$actives = Youtubeapi::getActiveBroadcasts();
		if (count($actives)>0) {
			$livestatus = true;
			$videourl = Youtubeapi::getVideoURLById($actives[0]->id);
		} else {
			$livestatus = false;
			$videourl = "#";
		}
		// $places = array_values($places);
		// dd($places);
		return view("homepage", ["places"=>$places, "livestatus"=>$livestatus, "videourl"=>$videourl]);
	}

	public function allLiveStreams()
	{
		$broadcasts = Youtubeapi::getAllChannelBroadcasts();
		dd($broadcasts);
		return view("homepage", ["places"=>$places, "livestatus"=>$livestatus, "videourl"=>$videourl]);
	}

}
