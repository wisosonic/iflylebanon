<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;
use App\Tour;
use App\Booking;
use App\Admin;
use App\User;
use App\Blacklist;
use App\Whitelist;

class AdminController extends Controller {

	public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
    	$array = array();
    	$array["admins"] = Admin::count();
    	$array["agencies"] = Agency::count();
    	$array["tours"] = Tour::count();
    	$array["bookings"] = Booking::count();
    	$array["blacklists"] = Blacklist::count();
    	$array["whitelists"] = Whitelist::count();
    	return view('Administration/homepage', $array);
    }

    //-------------- Agencies ------------------//

    public function getAllAgencies()
    {
    	$agencies = Agency::all();
    	return view("Administration/Agencies/allagencies", ["agencies"=>$agencies]);
    }

	public function getActivateAgency ()
	{
		$agencies = Agency::where("activated", "=", 0)->get();
		$activated = Agency::where("activated","=", 1)->get();
		return view("Administration/Agencies/activateagency", ["agencies"=>$agencies, "activated"=>$activated]);
	}
	public function postActivateAgency (Request $request)
	{
		$data = $request->all();
		array_shift($data);
		$message = Agency::activateAgency($data);
		return redirect("/admin/activate-agency")->with(["message"=>$message]);
	}

	//-------------- Admins ------------------//

	public function getAllAdmins()
    {
    	$admins = User::has("admin")->get();
    	return view("Administration/Admins/alladmins", ["admins"=>$admins]);
    }

	public function getAddAdmin()
	{
		$users = User::doesntHave("admin")->get();
		$admins = User::has("admin")->get();
		return view('Administration/Admins/addadmin', ["users"=>$users, "admins"=>$admins]);
	}

	public function postAddAdmin(Request $request)
	{
		$data = $request->all();
		array_shift($data);
		$message = Admin::addadmin($data);
		return redirect("/admin/add-admin")->with(["message"=>$message]);
	}

	public function deleteAdmin($id)
    {
    	$message = Admin::deleteAdmin($id);
    	return redirect("/admin/all-admins")->with(["message"=>$message]);
    }

    //-------------- Blacklists ------------------//

	public function getAllBlacklists()
	{
		$blacklists = User::has("blacklist")->get();
    	return view("Administration/Blacklists/allblacklists", ["blacklists"=>$blacklists]);
	}

	public function getAddBlacklist()
	{
		$users = User::doesntHave("blacklist")->get();
		$blacklists = User::has("blacklist")->get();
		return view('Administration/Blacklists/addblacklist', ["users"=>$users, "blacklists"=>$blacklists]);
	}

	public function postAddBlacklist(Request $request)
	{
		$data = $request->all();
		array_shift($data);
		$message = Blacklist::addBlacklist($data);
		Whitelist::deleteWhitelist($data["user_id"]);
		return redirect("/admin/add-to-blacklist")->with(["message"=>$message]);
	}

	public function deleteBlacklist($id)
    {
    	$message = Blacklist::deleteBlacklist($id);
    	Whitelist::addWhitelist(["user_id"=>$id]);
    	return redirect("/admin/all-blacklists")->with(["message"=>$message]);
    }

	public function getEditeBlacklist($id)
    {
    	$blacklist = User::find($id)->blacklist()->first();
		return view('Administration/Blacklists/editblacklist', ["blacklist"=>$blacklist]);
    }

	public function postEditeBlacklist(Request $request)
    {
    	$data = $request->all();
		array_shift($data);
    	$message = Blacklist::editBlacklist($data);
		return redirect("/admin/all-blacklists")->with(["message"=>$message]);
    }

    //-------------- Whitelists ------------------//

    public function getAllWhitelists()
	{
		$whitelists = User::has("whitelist")->get();
    	return view("Administration/Whitelists/allwhitelists", ["whitelists"=>$whitelists]);
	}

	public function getAddWhitelist()
	{
		$users = User::doesntHave("whitelist")->get();
		$whitelists = User::has("whitelist")->get();
		return view('Administration/Whitelists/addwhitelist', ["users"=>$users, "whitelists"=>$whitelists]);
	}

	public function postAddWhitelist(Request $request)
	{
		$data = $request->all();
		array_shift($data);
		$message = Whitelist::addWhitelist($data);
		Blacklist::deleteBlacklist($data["user_id"]);
		return redirect("/admin/add-to-whitelist")->with(["message"=>$message]);
	}

}


