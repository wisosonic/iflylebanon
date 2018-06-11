<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model  {
	protected $table = "ratings";
	protected $fillable = [
							"user_id",
							"place_id",
							"rating"
							];


	public function user()
	{
		return $this->belongsTo("App\User")->first();
	}

	public function place()
	{
		return $this->belongsTo("App\Place")->first();
	}

}