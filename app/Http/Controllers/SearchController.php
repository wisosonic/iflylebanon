<?php namespace App\Http\Controllers;

use Auth;
use App\Place;

use Illuminate\Http\Request;

class SearchController extends Controller {

	public function search(Request $request)
	{
		$data = $request->all();
		array_shift($data);
		$motif = $data["search"];
		$places = Place::where("title","like","%".$motif."%")
					->orWhere("description","like","%".$motif."%")
					->orWhere("department","like","%".$motif."%")
					->orWhere("text","like","%".$motif."%")
					->get();
		return view("searchresults", ["search"=>$motif, "places"=>$places, "type"=>"place"]);
	}	

	public function searchTag(Request $request)
	{
		$data = $request->all();
		array_shift($data);
		$tag = $data["tagsearch"];
		$places = Place::where("tags","like",'%"'.$tag.'"%')
					->get();
		return view("searchresults", ["search"=>$tag, "places"=>$places, "type"=>"tag"]);
	}


}