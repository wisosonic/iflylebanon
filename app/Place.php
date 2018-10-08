<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Place;
use Auth;

class Place extends Model  {
	
	protected $table = "places";
	protected $fillable = [
							"title",
							"slug",
							"tags",
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

	public function comments()
	{
		return $this->hasMany("App\Comment");
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

	public static function addNewComment($request)
	{
		try {
			$data = $request->all();
			$place = Place::find($data["place_id"]);
			$user = Auth::user();
			$res = Purify::checkProfanity($data["comment"]);
			$comment = new Comment();
			$comment->comment  = $data["comment"];
			if ($res["found"] > 0) {
				$comment->blocked = true;
				$comment->filteredcomment = $res["text"];
				$profanity = "blocked";
				$user->addwarning();
			} else {
				$comment->blocked = false;
				$profanity = "clear";
			}
			$comment->place_id = $place->id;
			$comment->user_id  = Auth::user()->id;
			$comment->save();
			return ["message"=>"commentadded", "slug"=>$place->slug, "profanity"=>$profanity];
		} catch (Exception $e) {
			return ["message"=>"commenterror", "slug"=>$place->slug, "profanity"=>$profanity];
		}
	}

	public static function deleteComment($comment_id)
	{
		try {
			$comment = Comment::find($comment_id);
			if (Auth::user() == $comment->user()) {
				$comment->delete();
				return ["message"=>"commentdeleted", "slug"=>$comment->place()->slug];
			} else {
				return ["message"=>"commentdeletunauthorised", "slug"=>$comment->place()->slug];
			}
		} catch (Exception $e) {
			return ["message"=>"commentdeleteerror", "slug"=>$comment->place()->slug];
		}
	}

	public static function addNewPlace($request)
	{
		try {
			$data = $request->all();
			$place = new Place();
			$place->title = $data["title"];
			$place->slug = urlencode($data["title"]);
			if ($data["tags"] == "") {
				$data["tags"] = array();
			}
			$place->tags = json_encode($data["tags"]);
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

	public function relatedPlaces()
	{
		$place_tags = json_decode($this->tags,true);
		$allplaces = Place::all();
		$related = array();
		foreach ($allplaces as $key => $place) {
			if ($place->id != $this->id) {
				$tags = json_decode($place->tags,true);
				foreach ($tags as $key2 => $tag) {
					if (in_array($tag, $place_tags)) {
						array_push($related, $place);
						break 1;
					}
				}
			}
		}
		return $related;
	}

}