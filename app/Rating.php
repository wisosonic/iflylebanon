<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Place;
use Auth;

class Rating extends Model  {
	
	protected $table = "ratings";
	protected $fillable = [
							"user_id",
							"place_id",
							"rating"
							];


	public function user()
	{
		return $this->belongsTo("App\User")->first();
	}

	public function place()
	{
		return $this->belongsTo("App\Place")->first();
	}

	public static function ratePlace($data)
	{
		$user = Auth::user();
		if ($user) {
			$place = Place::find($data["placeid"]);
			$rating = $user->ratings()->where("place_id",$place->id)->first();
			if ($rating) {
				$oldrating = $rating->rating;
				$newrating = $data["value"] ;
				$rating->rating = $data["value"];
				$rating->save();
				$place->updateRating();
				return ["updated",$place->rating, $place->ratings()->count(), $oldrating, $newrating];
			} else {
				$rating = new Rating();
				$rating->user_id = $user->id;
				$rating->place_id = $place->id;
				$rating->rating = $data["value"];
				$rating->save();
				$place->updateRating();
				return ["rated",$place->rating, $place->ratings()->count()];
			}
		} else {
			return ["nofound",""];
		}
	}

	public static function getStarsCount($place)
	{
		$rating = $place->rating;
		if ($rating >= 0 && $rating <= 0.5) {
			$stars ="0-5";
		} else if ($rating > 0.5 && $rating <= 1) {
			$stars ="1";
		} else if ($rating > 1 && $rating <= 1.5) {
			$stars ="1-5";
		} else if ($rating > 1.5 && $rating <= 2) {
			$stars ="2";
		} else if ($rating > 2 && $rating <= 2.5) {
			$stars ="2-5";
		} else if ($rating > 2.5 && $rating <= 3) {
			$stars ="3";
		} else if ($rating > 3 && $rating <= 3.5) {
			$stars ="3-5";
		} else if ($rating > 3.5 && $rating <= 4) {
			$stars ="4";
		} else if ($rating > 4 && $rating <= 4.5) {
			$stars ="4-5";
		} else if ($rating > 4.5 && $rating <= 5) {
			$stars ="5";
		}
		return $stars;
	}

}