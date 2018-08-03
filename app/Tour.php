<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Tour extends Model  {

	protected $table = 'tours';
	protected $fillable = [
					        'title', 
					        'description', 
					        'date', 
					        'duration', 
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

}