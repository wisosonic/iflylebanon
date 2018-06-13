<?php namespace App\Http\Controllers;

use Auth;
use App\Place;

use Illuminate\Support\Facades\Request;

class HomeController extends Controller {

	public function homepage()
	{
		$places = Place::all();
		return view("homepage", ["places"=>$places]);
	}

}
