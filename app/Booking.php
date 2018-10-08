<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Tour;
use App\Booking;
use Auth;

class Booking extends Model  {

	protected $table = 'bookings';
	protected $fillable = [
        'name', 'phone', 'user_id', 'tour_id', 'places', 'total'
    ];

	public function user()
	{
		return $this->belongsTo("App\User");
	}

	public function tour()
	{
		return $this->belongsTo("App\Tour");
	}

	public static function makeBooking($data)
	{
		$user = Auth::user();
		try {
			$tour = Tour::find($data["tour_id"]);
			if ($tour->availableplaces >= $data["places"]) {
				$booking = new Booking();
				$booking->name = $data["name"];
				$booking->phone = $data["phone"];
				$booking->places = $data["places"];
				$booking->total = $data["places"] * $tour->price;
				$user->bookings()->save($booking);
				$tour->bookings()->save($booking);
				$tour->availableplaces = $tour->availableplaces - $data["places"];
				$tour->save();
				$booking->save();
				return "booked";
			} else {
				return "noavailableplaces";
			}
		} catch (Exception $e) {
			return "notbooked";
		}
	}
}