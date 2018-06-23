<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use App\User;

class UserController extends Controller {

	public function checkEmailAvailability(Request $request)
	{
		$data = $request->all();
		$availability = User::checkEmailAvailability($data["email"]);
		if ($availability) {
			return 'false';
		} else {
			return 'true';
		}
	}

}