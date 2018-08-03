<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Tour extends Model  {

	protected $guard = 'tours';
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

}