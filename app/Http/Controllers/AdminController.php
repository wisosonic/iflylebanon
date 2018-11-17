<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;
use App\Tour;
use App\Booking;
use App\Admin;
use App\User;
use App\Blacklist;
use App\Whitelist;
use App\Keyword;
use App\Report;
use App\Place;

class AdminController extends Controller {

	public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
    	$array = Report::getAllReports();
    	$array["admins"] = Admin::count();
    	$array["agencies"] = Agency::count();
    	$array["tours"] = Tour::count();
    	$array["bookings"] = Booking::count();
    	$array["blacklists"] = Blacklist::count();
    	// $array["whitelists"] = Whitelist::count();
    	return view('Administration/homepage', $array);
    }

    //-------------- Agencies ------------------//

    public function getAllAgencies()
    {
    	$array = Report::getAllReports();
    	$array["agencies"] = Agency::all();
    	return view("Administration/Agencies/allagencies", $array);
    }

	public function getActivateAgency ()
	{
		$array = Report::getAllReports();
		$array["agencies"] = Agency::where("activated", "=", 0)->get();
		$array["activated"] = Agency::where("activated","=", 1)->get();
		return view("Administration/Agencies/activateagency", $array);
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
    	$array = Report::getAllReports();
    	$array["admins"] = User::has("admin")->get();
    	return view("Administration/Admins/alladmins", $array);
    }

	public function getAddAdmin()
	{
		$array = Report::getAllReports();
		$array["users"] = User::doesntHave("admin")->get();
		$array["admins"] = User::has("admin")->get();
		return view('Administration/Admins/addadmin', $array);
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
		$array = Report::getAllReports();
		$array["blacklists"] = User::has("blacklist")->get();
    	return view("Administration/Blacklists/allblacklists", $array);
	}

	public function getAddBlacklist()
	{
		$array = Report::getAllReports();
		$array["users"] = User::doesntHave("blacklist")->get();
		$array["blacklists"] = User::has("blacklist")->get();
		return view('Administration/Blacklists/addblacklist', $array);
	}

	public function postAddBlacklist(Request $request)
	{
		$data = $request->all();
		array_shift($data);
		$message = Blacklist::addBlacklist($data);
		// Whitelist::deleteWhitelist($data["user_id"]);
		return redirect("/admin/add-to-blacklist")->with(["message"=>$message]);
	}

	public function deleteBlacklist($id)
    {
    	$message = Blacklist::deleteBlacklist($id);
    	// Whitelist::addWhitelist(["user_id"=>$id]);
    	return redirect("/admin/all-blacklists")->with(["message"=>$message]);
    }

	public function getEditeBlacklist($id)
    {
    	$array = Report::getAllReports();
    	$array["blacklist"] = User::find($id)->blacklist()->first();
		return view('Administration/Blacklists/editblacklist', $array);
    }

	public function postEditeBlacklist(Request $request)
    {
    	$data = $request->all();
		array_shift($data);
    	$message = Blacklist::editBlacklist($data);
		return redirect("/admin/all-blacklists")->with(["message"=>$message]);
    }

    //-------------- Whitelists ------------------//

 //    public function getAllWhitelists()
	// {
	// 	$whitelists = User::has("whitelist")->get();
 //    	return view("Administration/Whitelists/allwhitelists", ["whitelists"=>$whitelists]);
	// }

	// public function getAddWhitelist()
	// {
	// 	$users = User::doesntHave("whitelist")->get();
	// 	$whitelists = User::has("whitelist")->get();
	// 	return view('Administration/Whitelists/addwhitelist', ["users"=>$users, "whitelists"=>$whitelists]);
	// }

	// public function postAddWhitelist(Request $request)
	// {
	// 	$data = $request->all();
	// 	array_shift($data);
	// 	// $message = Whitelist::addWhitelist($data);
	// 	$message = Blacklist::deleteBlacklist($data["user_id"]);
	// 	return redirect("/admin/add-to-whitelist")->with(["message"=>$message]);
	// }

	//-------------- keywords ------------------//

    public function getAllKeywords()
    {
    	$array = Report::getAllReports();
    	$array["keywords"] = Keyword::all();
		return view('Administration/Keywords/allkeywords', $array);
    }
    public function deleteKeyword($id)
    {
    	$message = Keyword::deleteKeyword($id);
    	return redirect("/admin/all-keywords")->with(["message"=>$message]);
    }

    public function getAddKeyword()
	{
		return view('Administration/Keywords/addkeyword');
	}

    public function postAddKeyword(Request $request)
	{
		$data = $request->all();
		array_shift($data);
		$message = Keyword::addKeyword($data);
    	return redirect("/admin/add-keyword")->with(["message"=>$message]);
	}

	//-------------- Reports ------------------//

    public function getAllPlaceReports()
    {
    	$array = Report::getAllReports();
		return view('Administration/Reports/allreports', $array);
    }

    public function acceptPlaceReport($id)
    {
    	$report = Report::find($id);

    	$place = $report->place()->first();
    	$place->negative = $place->negative + 1;
		$place->save();
		$place->updateStatus("reports");

		$report->reviewed = true;
		$report->decision = "accepted";
		$report->save();

		return redirect("/admin/all-reports")->with(["message"=>"accepted"]);
    }
    
    public function dismissPlaceReport($id)
    {
    	$report = Report::find($id);
    	$report->reviewed = true;
    	$report->decision = "dismissed";
		$report->save();

		return redirect("/admin/all-reports")->with(["message"=>"dismissed"]);
    }

}


