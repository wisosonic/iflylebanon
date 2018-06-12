<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;

class HomeController extends Controller {

	public function homepage()
	{
		return view("homepage");
	}

}
