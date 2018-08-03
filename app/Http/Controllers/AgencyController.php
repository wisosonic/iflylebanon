<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;

class AgencyController extends Controller {

    public function index()
    {
        return view('admin');
    }

}