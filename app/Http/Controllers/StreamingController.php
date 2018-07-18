<?php namespace App\Http\Controllers;

use Auth;
use App\Place;
use App\Youtubeapi;

use Illuminate\Support\Facades\Request;

class StreamingController extends Controller {

	public function checkLiveStreaming()
	{
		$places = array_fill_keys(Place::all()->pluck("id")->toArray(), false);
		$actives = Youtubeapi::getActiveBroadcasts();
		foreach ($actives as $key => $active) {
			$place = Place::where("title", "=",$active->snippet->title)->first();
			if ($place) {
				$places[$place->id] = Youtubeapi::getVideoURLById($active->id);
			}
		}
		return json_encode($places);
	}

	public function allLiveStreams()
	{
		$broadcasts = Youtubeapi::getAllChannelBroadcasts();
		return view("broadcasts", ["broadcasts"=>$broadcasts]);
	}

}