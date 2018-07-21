<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function places()
    {
        return $this->hasMany("App\Place");
    }

    public function favoritePlaces()
    {
        return $this->belongsToMany("App\Place");
    }

    public static function addToFavoritePlaces($id)
    {
        $place = Place::find($id);
        if ($place) {
            $user = Auth::user();
            $favorite_places_ids = $user->favoriteplaces()->pluck("place_id")->toArray();
            if (in_array($id, $favorite_places_ids)) {
                return "exists";
            } else {
                $user->favoritePlaces()->attach($id);
                return "added";
            }
        } else {
            return "notfound";
        }
        
    }

    public function Ratings()
    {
        return $this->hasMany("App\Rating");
    }
}
