<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\Purify;

class Blacklist extends Model  {
	
	protected $table = "blacklists";
	protected $fillable = [
							"reason",
							"details",
							"user_id"
						];

	public function user()
	{
		return $this->belongsTo("App\User")->first();
	}

	public static function addBlacklist($data)
	{
		$user = User::find($data["user_id"]);
		if ($user) {
			if ($user->blacklist()->first()) {
				return "blacklistexists";
			} else {
				$blacklist = Blacklist::create($data);
				$user->blacklist()->save($blacklist);
				$blacklist->save();
				return "blacklistadded";
			}
		} else {
			return "usernotfound";
		}
	}

	public static function deleteBlacklist($id)
	{
		$user = User::find($id);
		if ($user) {
			if ($user->blacklist()->first()) {
				$user->blacklist()->delete();
				return "blacklistdeleted";
			} else {
				return "blacklistnotfound";
			}
		} else {
			return "usernotfound";
		}
	}

	public static function editBlacklist($data)
	{
		$blacklist = Blacklist::find($data["blacklist_id"]);
		if ($blacklist) {
			$blacklist->reason = $data["reason"];
			$blacklist->details = $data["details"];
			$blacklist->save();
			return "blacklistedited";
		} else {
			return "blacklistnotfound";
		}
	}
}