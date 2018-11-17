<?php namespace App\Http\Controllers;

use Auth;
use App\Place;
use App\Youtubeapi;
use App\Livestream;

use Illuminate\Support\Facades\Request;

class StreamingController extends Controller {

	public function checkLiveStreaming()
	{
		$places = array_fill_keys(Place::where("status","valid")->pluck("id")->toArray(), false);
		$counts = array_fill_keys(Place::where("status","valid")->pluck("id")->toArray(), 0);

		$actives = Livestream::where("status","live")->get();

		foreach ($actives as $key => $active) {
			$place = $active->place()->first();
			$places[$place->id] = true;
			$counts[$place->id] = $counts[$place->id] + 1;
		}
		return json_encode(["places"=>$places, "counts"=>$counts]);
	}

	public function allLiveStreams()
	{
		//$broadcasts = Youtubeapi::getAllChannelBroadcasts();
		$broadcasts = array();
		$actives = Livestream::where("status","live")->get();
		foreach ($actives as $key => $broadcast) {
			array_push($broadcasts, Youtubeapi::getBroadcastById($broadcast->video_id)["items"][0]);
		}
		return view("broadcasts", ["broadcasts"=>$broadcasts]);
	}

}