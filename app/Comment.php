<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\Purify;

class Comment extends Model  {
	
	protected $table = "comments";
	protected $fillable = [
							"comment",
							"filteredcomment",
							"blocked",
							"place_id",
							"user_id"
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