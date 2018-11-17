<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\User;
use App\Place;
use App\livestream;
use App\Comment;

class Report extends Model  {

	protected $table = 'reports';
	protected $fillable = [
        'reason', 'details', 'place_id', 'comment_id', 
        'livestream_id', 'reporter_id', 'reviewed', 'decision'
    ];

    public function user()
    {
    	return $this->belongsTo("App\User", "reporter_id");
    }

    public function place()
    {
    	return $this->belongsTo("App\Place");
    }    

    public function livestream()
    {
    	return $this->belongsTo("App\Livestream");
    }    

    public function comment()
    {
    	return $this->belongsTo("App\Comment");
    }

    public static function getAllReports()
    {
    	$array = array();
    	$array["place_reports"] = Report::where("place_id",">",0)->get();
    	$array["place_reports_to_review"] = Report::where("place_id",">",0)->where("reviewed",false)->count();
    	$array["livestream_reports"] = Report::where("livestream_id",">",0)->get();
    	$array["livestream_reports_to_review"] = Report::where("livestream_id",">",0)->where("reviewed",false)->count();
    	$array["comment_reports"] = Report::where("comment_id",">",0)->get();
    	$array["comment_reports_to_review"] = Report::where("comment_id",">",0)->where("reviewed",false)->count();
    	return $array;
    }

    public static function reportPlace ($place_id)
	{
		$user = Auth::user();
		$place = Place::find($place_id);
		if ($place) {
			if ($user->reports()->where("place_id",$place->id)->first()) {
				return "alreadyreported";
			} else {
				$report = new Report();
				$report->reason = "reported place";
				$report->details = "";
				$report->place_id = $place->id;
				$report->reporter_id = $user->id;
				$report->reviewed = false ;
				$report->save();
				return "reported";
			}
		} else {
			return "placenotexist";
		}
	}

}