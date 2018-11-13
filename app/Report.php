<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Place;
use App\livestream;
use App\Comment;

class Report extends Model  {

	protected $table = 'reports';
	protected $fillable = [
        'name', 'phone', 'address', 'user_id'
    ];


}