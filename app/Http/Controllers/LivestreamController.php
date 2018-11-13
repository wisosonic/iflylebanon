<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livestream;
use App\Youtubeapi;
use App\Place;

class LivestreamController extends Controller {

	public function __construct()
	{
	    $this->middleware('blacklist', ['only' => [	'ratePlace' ] ]);
	}

	public function searchLiveStreaming (Request $request)
	{
		$data = $request->all();
		$video_id = Youtubeapi::getVideoId($data["youtubeurl"]);
		$video = Livestream::where("video_id",$video_id)->first();
		if ($video) {
			if ($video->status == "live") {
				$message = "addedLive";
			} else {
				$message = "addedOffline";
			}
		} else {
			$message = "notAdded";
		}
		$res = Youtubeapi::getBroadcastById($video_id)["items"];
		return json_encode(['message'=>$message, 'res'=>$res]);
	}

	public function publishLiveStreaming (Request $request)
	{
		$data = $request->all();
		$message = Livestream::publishLiveStreaming($data);
		return redirect("/")->with(["message"=>$message]);
	}
	public function updateLiveStreaming (Request $request)
	{
		$data = $request->all();
		$message = Livestream::updateLiveStreaming($data);
		return redirect("/")->with(["message"=>$message]);
	}
	public function getLiveStreaming (Request $request)
	{
		$data = $request->all();
		$livestreams = array();
		$place = Place::find($data["place_id"]);
		if ($place) {
			$streams = $place->livestreams()->get();
			foreach ($streams as $key => $stream) {
				$object = Youtubeapi::getBroadcastById($stream->video_id)["items"][0];
				\Log::info($stream);
				$object["user"] = $stream->user()->first();
				$object["video_id"] = $stream->video_id;
				$object["stream_id"] = $stream->id;
				array_push($livestreams, $object);
			}
		}
		return json_encode(["videos"=>$livestreams, "place"=>$place]);
	}

	public function reportLiveStreaming ($video_id)
	{
		dd($video_id);
	}

}