<?php namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Rating;

class LivestreamController extends Controller {

	public function __construct()
	{
	    $this->middleware('blacklist', ['only' => [	'ratePlace' ] ]);
	}

	

}