<?php namespace App\Http\Controllers;

use Auth;
use App\Report;
use App\Place;
use App\Youtubeapi;
use App\Livestream;

use Illuminate\Support\Facades\Request;

class ReportController extends Controller {

	public function __construct()
	{
	    $this->middleware('blacklist', ['only' => [	'ratePlace' ] ]);
	}

	public function reportPlace ($place_id)
	{
		$place = Place::find($place_id);
		if ($place) {
			$message = Report::reportPlace($place_id);
			return redirect("/location/" . $place->slug)->with(["message"=>$message]);
		} else {
			return redirect("/");
		}
	}

	public function reportLiveStreaming ($video_id)
	{
		dd($video_id);
	}

}