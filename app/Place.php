<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;

class Place extends Model  {
	protected $table = "places";
	protected $fillable = [
							"title",
							"department",
							"coordinates",
							"description",
							"rating",
							"user_id"
						];


	public function user()
	{
		return $this->belongsTo("App\User")->first();
	}

	public function ratings()
	{
		return $this->hasMany("App\Rating");
	}

	public function placeInsert(Request $request)
	{
		$user = Auth::user(); 

		$data = $request->all;
		$newPlace = new Place();
		$newPlace->title=$data['title'];
		$newPlace->department=$data['department'];
		$newPlace->title=$data['coordinates'];
		$newPlace->description=$data['description'];
		$newPlace->rating=$data['rating'];
		$newPlace->user_id=$user->id;
		$newPlace->save();
		
	}

}