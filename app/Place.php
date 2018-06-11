<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model  {
	protected $table = "places";
	protected $fillable = [
							"tite",
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

}