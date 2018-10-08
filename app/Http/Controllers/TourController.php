<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tour;
use App\Booking;
use Carbon\Carbon;

class TourController extends Controller {

	public function __construct()
	{
	    $this->middleware('blacklist', ['only' => [	'postBookTour' ] ]);
	}

	public function str_replace_first($from, $to, $content)
	{
	    $from = '/'.preg_quote($from, '/').'/';
	    return preg_replace($from, $to, $content, 1);
	}

	public function getAllTours()
	{
		$tours = Tour::where("id",">",0)->orderBy('date', 'asc')->get();
		$thisweek = array();
		$upcoming = array();
		$ended = array();
		foreach ($tours as $key => $tour) {
			$date1 = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateTimeString())->addWeek();
			if ($tour->date >= Carbon::now()->toDateTimeString()) {
				if ($tour->date <= $date1->toDateTimeString()) {
					$tour->date = date('d-m-Y h:i A', strtotime($tour->date));
					$tour->date = str_replace_first(" ", " at ", $tour->date);
					array_push($thisweek, $tour);
				} else {
					$tour->date = date('d-m-Y h:i A', strtotime($tour->date));
					$tour->date = str_replace_first(" ", " at ", $tour->date);
					array_push($upcoming, $tour);
				}
			} else {
				$tour->date = date('d-m-Y h:i A', strtotime($tour->date));
				$tour->date = str_replace_first(" ", " at ", $tour->date);
				array_push($ended, $tour);
			}
		}
		return view("alltours", ["thisweek"=>$thisweek, "upcoming"=>$upcoming, "ended"=>$ended]);
	}

	public function getTourById($id)
	{
		$tour = Tour::find($id);
		$date = Carbon::createFromFormat('Y-m-d H:i:s', $tour->date);
		$availableBooking = Carbon::now()->toDateTimeString() < $date ;
		if ($tour) {
			$tour->date = date('d-m-Y h:i A', strtotime($tour->date));
			$tour->date = str_replace_first(" ", " at ", $tour->date);
			return view("tour", ["tour"=>$tour, "availableBooking"=>$availableBooking]);
		} else {
			return redirect("/")->with(["message"=>"tournotexists"]);
		}
	}

	public function getBookTour($id)
	{
		if (Auth::user()) {
			$tour = Tour::find($id);
			$tour->date = date('d-m-Y h:i A', strtotime($tour->date));
			$tour->date = str_replace_first(" ", " at ", $tour->date);
			return view("booktour", ["tour"=>$tour]);
		} else {
			return redirect("/");
		}
	}

	public function postBookTour(Request $request)
	{
		$data = $request->all();
        array_shift($data);
        $message = Booking::makeBooking($data);
		return redirect("/")->with(["message"=>$message]);
	}
}