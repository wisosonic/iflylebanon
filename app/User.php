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

    public function favoriteTags()
    {
        $places = $this->favoritePlaces()->get();
        $tags = array();
        foreach ($places as $key => $place) {
            $place_tags = json_decode($place->tags,true);
            foreach ($place_tags as $key2 => $tag) {
                if (! in_array($tag, $tags)) {
                    array_push($tags, $tag);
                }
            }
        }
        return $tags;
    }

    public function placeYouMayLike()
    {
        $favoriteTags = $this->favoriteTags();
        $favoritePlacesIds = $this->favoritePlaces()->pluck("place_id")->toArray();
        $allplaces = Place::all();
        $suggests = array();
        foreach ($allplaces as $key => $place) {
            if (! in_array($place->id, $favoritePlacesIds)) {
                $tags = json_decode($place->tags,true);
                foreach ($tags as $key2 => $tag) {
                    if (in_array($tag, $favoriteTags)) {
                        array_push($suggests, $place);
                        break 1;
                    }
                }
            }
        }
        if (count($suggests)==0) {
            foreach ($allplaces as $key => $place) {
                if (! in_array($place->id, $favoritePlacesIds)) {
                    array_push($suggests, $place);
                }
            }
        }
        return [$suggests,$favoriteTags];
    }
}
