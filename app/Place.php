<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;

class Place extends Model  {
	protected $table = "places";
	protected $fillable = [
							"title",
							"department",
							"coordinates",
							"description",
							"rating",
							"user_id"
						];


	public function user()
	{
		return $this->belongsTo("App\User")->first();
	}

	public function ratings()
	{
		return $this->hasMany("App\Rating");
	}

	public function updateRating()
	{
		$average = 0;
		$ratings = $this->ratings()->get();
		if ($ratings->count() > 0) {
			foreach ($ratings as $key => $rating) {
				$average = $average + $rating->rating;
			}
			$average = round($average / $ratings->count(), 2, PHP_ROUND_HALF_UP);
		}
		$this->rating = $average;
		$this->save();
	}

}