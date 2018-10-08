<?php namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\Place;

class PlaceController extends Controller {

	public function __construct()
	{
	    $this->middleware('blacklist', ['only' => [	'getAddNewPlace', 
	    											'postAddNewPlace', 
	    											'postAddComment', 
	    											'deleteComment'
	    											]
	    								]);
	}

	public function getPlace($slug)
	{
		$place = Place::where("slug",$slug)->first();
		if ($place) {
			$place->long = explode(" ", $place->coordinates)[0]; 
			$place->lat = explode(" ", $place->coordinates)[1];
			$place->commentsurl = "http://iflylebanon.com/location/" . $place->slug ;
			$place->comments = $place->comments()->get();
			$related = $place->relatedPlaces();
			$place->tags =  json_decode($place->tags,true);
			return view("Places/placedetails", ["place"=>$place, "related"=>$related]);
		}	
	}

	public function getAddNewPlace()
	{
		$user = Auth::user();
		if ($user) {
			return view("Places/addnewplace", ["user_id"=>$user->id]);
		} else {
			return redirect("/");
		}
	}

	public function postAddNewPlace(Request $request)
	{
		$message = Place::addNewPlace($request);
		return redirect("/")->with(["message"=>$message]);
	}

	public function postAddComment(Request $request)
	{
		$res = Place::addNewComment($request);
		$slug = $res["slug"];
		$message = $res["message"];
		$profanity = $res["profanity"];
		return redirect("/location/".$slug)->with(["message"=>$message, "jumpto"=>"commentsdiv", "profanity"=>$profanity]);
	}

	public function deleteComment($comment_id)
	{
		$res = Place::deleteComment($comment_id);
		$slug = $res["slug"];
		$message = $res["message"];
		return redirect("/location/".$slug)->with(["message"=>$message, "jumpto"=>"commentsdiv"]);
	}

}