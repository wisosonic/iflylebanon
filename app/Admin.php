<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Agency;

class Admin extends Model  {

	protected $table = 'admins';
	protected $fillable = [
        'user_id'
    ];

	public function user()
	{
		return $this->belongsTo("App\User");
	}

	public static function addadmin($data)
	{
		$user = User::find($data["user_id"]);
		if ($user) {
			if ($user->admin()->first()) {
				return "adminexists";
			} else {
				$admin = new Admin();
				$user->admin()->save($admin);
				$admin->save();
				return "adminadded";
			}
		} else {
			return "usernotfound";
		}
	}

	public static function deleteAdmin($id)
	{
		$user = User::find($id);
		if ($user) {
			if ($user->admin()->first()) {
				$user->admin()->delete();
				return "admindeleted";
			} else {
				return "adminnotfound";
			}
		} else {
			return "usernotfound";
		}
	}

}