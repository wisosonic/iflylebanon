<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Booking extends Model  {

	protected $table = 'bookings';
	protected $fillable = [
        'user_id', 'tour_id'
    ];

	public function user()
	{
		return $this->belongsTo("App\User");
	}

	public function tour()
	{
		return $this->belongsTo("App\Tour");
	}
}