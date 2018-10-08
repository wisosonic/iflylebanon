<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tour;
use App\Agency;

class Tour extends Model  {

	protected $table = 'tours';
	protected $fillable = [
					        'title', 
					        'description', 
					        'date', 
					        'duration',
					        'placestovisit',
					        'maxplaces', 
					        'availableplaces', 
					        'price', 
					        'meetingpoint', 
					        'details',
					        'agency_id'
					    ];

    public function agency()
    {
    	return $this->belongsTo("App\Agency");
    }

    public function bookings()
    {
    	return $this->hasMany("App\Booking");
    }

    public static function addNewTour($data)
    {
    	$agency = Agency::find($data["agency_id"]);
    	if ($agency) {
    		try {
    			$date = date_create($data["date"]. " " . $data["time"]);
            	$date = date_format($date,"Y-m-d H:i:s");
	    		$tour = new Tour();
		    	$tour->title = $data["title"];
		    	$tour->description = $data["description"];
		    	$tour->date = $date;
		    	$tour->duration = $data["duration"];
		    	$tour->placestovisit = $data["places"];
		    	$tour->maxplaces = $data["maxplaces"];
		    	$tour->availableplaces = $data["maxplaces"];
		    	$tour->price = $data["price"];
		    	$tour->meetingpoint = $data["meeting"];
		    	$agency->tours()->save($tour);
		    	return "touradded" ;
	    	} catch (Exception $e) {
	    		return "notadded";
	    	}
    	} else {
    		return "agencynotexists";
    	}
    }
}