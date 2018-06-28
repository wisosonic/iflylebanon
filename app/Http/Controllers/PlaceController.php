<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use App\Place;

class PlaceController extends Controller {

	public function placeInsert(Request $request)
	{
		$user = Auth::user(); 

		$data = $request->all;
		$newPlace = new Place();
		$newPlace->title=$data['title'];
		$newPlace->department=$data['department'];
		$newPlace->title=$data['coordinates'];
		$newPlace->description=$data['description'];
		$newPlace->rating=$data['rating'];
		$newPlace->user_id=$user->id;
		$newPlace->save();
		
	}

	public function getPlace($slug)
	{
		$place = Place::where("slug",$slug)->first();
		if ($place) {
			$place->long = explode(" ", $place->coordinates)[0]; 
			$place->lat = explode(" ", $place->coordinates)[1];
			$encoded = "%20" . urlencode("https://iflylebanon.com/?post_type=location&p=111") . "&t_u=" . urlencode("https://parposa.com/iflylebanon/location/" . strtolower($place->slug) . "/") . "&t_e=" . str_replace(" ", "%20", $place->title) . "&t_d=" . str_replace(" ", "%20", $place->title . " - I Fly Lebanon") . "&t_t=" . str_replace(" ", "%20", $place->title) . "&s_o=default#version=48537a333e429dcb726ce9cdcc57a44f";
			$disqus = "https://disqus.com/embed/comments/?base=default&f=iflylebanon&t_i=111" . $encoded;
			// $place->disqus = "https://disqus.com/embed/comments/?base=default&f=iflylebanon&t_i=111%20https%3A%2F%2Fiflylebanon.com%2F%3Fpost_type%3Dlocation%26p%3D111&t_u=https%3A%2F%2Fparposa.com%2Fiflylebanon%2Flocation%2Fafqa-waterfall%2F&t_e=Afqa%20Waterfall&t_d=Afqa%20Waterfall%20-%20I%20Fly%20Lebanon&t_t=Afqa%20Waterfall&s_o=default#version=48537a333e429dcb726ce9cdcc57a44f";
			// dd($disqus == $place->disqus);
			$place->commentsurl = "http://iflylebanon.com/location/" . $place->slug ;
			return view("Places/placedetails", ["place"=>$place]);
		}	
	}

}