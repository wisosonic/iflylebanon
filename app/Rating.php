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

}