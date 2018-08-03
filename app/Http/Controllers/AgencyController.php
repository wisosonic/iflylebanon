<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;

class AgencyController extends Controller {

    public function index()
    {
        return view('admin');
    }

    public function getMyTours()
    {
    	$user = Auth::user();
    	$agency = $user->agency()->first();
    	$tours = $agency->tours()->get();

    	return view("", ["tours"=>$tours]);
    }

}