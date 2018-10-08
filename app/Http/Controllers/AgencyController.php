<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Agency;
use App\Tour;
use Auth;
use Carbon\Carbon;

class AgencyController extends Controller {

    public function str_replace_first($from, $to, $content)
    {
        $from = '/'.preg_quote($from, '/').'/';

        return preg_replace($from, $to, $content, 1);
    }

    public function index()
    {
        $user = Auth::user();
        $agency = $user->agency()->first();
        $alltours = Tour::count();
        $tours = $agency->tours()->get();
        $bookings = 0 ;
        foreach ($tours as $key => $tour) {
            $bookings = $bookings + $tour->bookings()->count();
        }

        return view('Agencies/homepage', ["agency"=>$agency, "alltours"=>$alltours, "tours"=>$tours, "bookings"=>$bookings, "ca"=>$agency->ca()]);
    }

    public function getAllTours()
    {
        $user = Auth::user();
        $agency = $user->agency()->first();
        $tours = Tour::where("id",">",0)->orderBy('date', 'asc')->get();
        $date1 = Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->toDateTimeString())->addWeek();
        $thisweek = array();
        $upcoming = array();
        $ended = array();
        foreach ($tours as $key => $tour) {
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
        return view("Agencies/alltours", ["agency"=>$agency, "thisweek"=>$thisweek, "upcoming"=>$upcoming, "ended"=>$ended]);
    }

    public function getMyTours()
    {
        $user = Auth::user();
        $agency = $user->agency()->first();
        $tours = $agency->tours()->get();
        foreach ($tours as $key => $tour) {
            $tour->date = date('d-m-Y h:i A', strtotime($tour->date));
            $tour->date = str_replace_first(" ", " at ", $tour->date);
        }
        return view("Agencies/mytours", ["agency"=>$agency, "tours"=>$tours]);
    }

    public function getTourById($id)
    {
        $user = Auth::user();
        $agency = $user->agency()->first();
        $tour = Tour::find($id);
        if ($tour->agency()->first() == $agency) {
            $auth = true;
            $bookings = $tour->bookings()->get();
        } else {
            $auth = false;
            $bookings = array();
        }
        $tour->date = date('d-m-Y h:i A', strtotime($tour->date));
        $tour->date = str_replace_first(" ", " at ", $tour->date);
        return view("Agencies/tour", ["agency"=>$agency, "tour"=>$tour, "bookings"=>$bookings, "auth"=>$auth]);
    }

    public function getAddNewTour()
    {
        $user = Auth::user();
        $agency = $user->agency()->first();
    	return view("Agencies/addnewtour", ["agency"=>$agency]);
    }

    public function postAddNewTour(Request $request)
    {
        $data = $request->all();
        array_shift($data);
        $message = Tour::addNewTour($data);
        return redirect("/agency/my-tours")->with(["message"=>$message]);
    }

}