<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Place;

class Livestream extends Model  {

	protected $table = 'livestreams';
	protected $fillable = [
        'url','user_id','place_id'
    ];

	public function user()
	{
		return $this->belongsTo("App\User");
	}

	public function place()
	{
		return $this->belongsTo("App\Place");
	}

}