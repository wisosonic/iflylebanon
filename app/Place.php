<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;

class Place extends Model  {
	protected $table = "places";
	protected $fillable = [
							"title",
							"slug",
							"department",
							"coordinates",
							"description",
							"text",
							"image",
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
		$this->rating = number_format($average,1);
		$this->save();
	}

	public static function addNewPlace($request)
	{
		try {
			$data = $request->all();
			$place = new Place();
			$place->title = $data["title"];
			$place->slug = urlencode($data["title"]);
			$place->department = $data["department"];
			$place->coordinates = $data["lat"] . " " . $data["long"] ;
			$place->description = $data["description"];
			$place->text = $data["text"];
			$image = $request->file("coverphoto");
			$photoName = time().'.'.$image->getClientOriginalExtension();
			$data["coverphoto"]->move(public_path('/images/places'), $photoName);
			$place->image = '/images/places/' . $photoName;
			$place->rating = 0;
			$place->user_id=$data["user_id"];
			$place->save();
			return "placeadded";
		} catch (Exception $e) {
			return "placeerror";
		}
			
	}

}