<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\Purify;
use App\Keyword;

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

	public function checkNegative()
	{
		$keywords = Keyword::all()->pluck("word");
		foreach ($keywords as $key => $keyword) {
			if (strpos($this->comment, $keyword) !== false) {
				return false;
			}
		}
		return true;
	}

}