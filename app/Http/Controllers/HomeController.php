<?php namespace App\Http\Controllers;

use Auth;

use Illuminate\Support\Facades\Request;

class HomeController extends Controller {

	public function homepage()
	{
		return view("homepage");
	}

}
