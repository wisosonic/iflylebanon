<?php namespace App\Http\Controllers;

use Auth;
use App\Place;

use Illuminate\Support\Facades\Request;

class HomeController extends Controller {

	public function homepage()
	{
		$places = Place::all()->sortByDesc('rating')->values();
		// $places = array_values($places);
		// dd($places);
		return view("homepage", ["places"=>$places]);
	}

}
