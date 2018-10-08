<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Agency extends Model  {

	protected $table = 'agencies';
	protected $fillable = [
        'name', 'phone', 'address', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo("App\User")->first();
    }

    public function tours()
    {
    	return $this->hasMany("App\Tour");
    }

    public function CA()
    {
    	$tours = $this->tours()->get();
    	$ca = 0 ;
    	foreach ($tours as $key => $tour) {
    		$ca = $ca + $tour->bookings()->count()*$tour->price ;
    	}
    	return $ca;
    }

    public static function activateAgency($data)
    {
        $agency = Agency::find($data["agency_id"]);
        if ($agency) {
            $agency->activated = true;
            $agency->save();
            return "agencyactivated";
        } else {
            return "agencynotfound";
        }
    }

}