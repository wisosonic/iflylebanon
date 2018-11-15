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
        'reason', 'details', 'place_id', 'comment_id', 'livestrzam_id', 'reporter_id'
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
				$report->save();
				return "reported";
			}
		} else {
			return "placenotexist";
		}
	}

}