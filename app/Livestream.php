<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\User;
use App\Place;
use App\Youtubeapi;

class Livestream extends Model  {

	protected $table = 'livestreams';
	protected $fillable = [
        'url','status','video_id','user_id','place_id'
    ];

	public function user()
	{
		return $this->belongsTo("App\User");
	}

	public function place()
	{
		return $this->belongsTo("App\Place");
	}

	public static function updateLiveStreamingStatus()
	{
		$livestreams = Livestream::where("status","live")->get();
		foreach ($livestreams as $key => $livestream) {
			$live = Youtubeapi::getBroadcastById($livestream->video_id);
			if (count($live["items"])==0 || $live["items"][0]["snippet"]["liveBroadcastContent"]!="live") {
				$livestream->status = "offline";
				$livestream->save();
			}
		}
	}

	public static function publishLiveStreaming($data)
	{
		$place = Place::find($data["place_id"]);
		if ($place) {
			$newLiveStream = new Livestream();
			$newLiveStream->url = $data["youtubeurl"];
			$newLiveStream->status = "live";
			$newLiveStream->video_id = $data["video_id"];
			$newLiveStream->user_id = Auth::user()->id;
			$newLiveStream->place_id = $place->id;
			$newLiveStream->save();
			return "published";
		} else {
			return "placenotexist";
		}
	}

	public static function updateLiveStreaming($data)
	{
		$place = Place::find($data["place_id"]);
		if ($place) {
			$livestream = Livestream::where("video_id", $data["video_id"])->first();
			$livestream->video_id = $data["video_id"];
			$livestream->place_id = $place->id;
			$livestream->status = "live";
			$livestream->save();
			return "updated";
		} else {
			return "placenotexist";
		}
	}

}