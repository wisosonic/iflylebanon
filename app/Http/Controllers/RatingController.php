<?php namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Rating;

class RatingController extends Controller {

	public function ratePlace(Request $request)
	{
		$data = $request->all();
		$response = Rating::ratePlace($data);
		return json_encode($response);
	}

}