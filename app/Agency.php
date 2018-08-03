<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Agency extends Model  {

	protected $table = 'agencies';
	protected $fillable = [
        'name', 'address', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo("App\User")->first();
    }

    public function tours()
    {
    	return $this->hasMany("App\Tour");
    }

}