<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Agency extends Model  {
	protected $guard = 'agencies';

	protected $fillable = [
        'name', 'address', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo("App\User")->first();
    }

}