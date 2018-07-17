<?php namespace App\Http\Controllers;

use Auth;
use App\Place;
use App\Youtubeapi;

use Illuminate\Support\Facades\Request;

class StreamingController extends Controller {

	public function checkactive()
	{
		$actives = Youtubeapi::getActiveBroadcasts();
		if (count($actives)>0) {
			$livestatus = true;
			$videourl = Youtubeapi::getVideoURLById($actives[0]->id);
		} else {
			$livestatus = false;
			$videourl = "#";
		}
		return ["livestatus"=>$livestatus, "videourl"=>$videourl];
	}

	public function allLiveStreams()
	{
		$broadcasts = Youtubeapi::getAllChannelBroadcasts();
		return view("broadcasts", ["broadcasts"=>$broadcasts]);
	}

}