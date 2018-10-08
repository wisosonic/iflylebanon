<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\Purify;

class Whitelist extends Model  {
	
	protected $table = "whitelists";
	protected $fillable = [
							"user_id"
						];

	public function user()
	{
		return $this->belongsTo("App\User")->first();
	}

	public static function addWhitelist($data)
	{
		$user = User::find($data["user_id"]);
		if ($user) {
			if ($user->whitelist()->first()) {
				return "whitelistexists";
			} else {
				$whitelist = Whitelist::create($data);
				$user->whitelist()->save($whitelist);
				$whitelist->save();
				return "whitelistadded";
			}
		} else {
			return "usernotfound";
		}
	}

	public static function deleteWhitelist($id)
	{
		$user = User::find($id);
		if ($user) {
			if ($user->whitelist()->first()) {
				$user->whitelist()->delete();
				return "whitelistdeleted";
			} else {
				return "whitelistnotfound";
			}
		} else {
			return "usernotfound";
		}
	}
}