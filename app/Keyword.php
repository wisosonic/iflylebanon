<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model  {

	protected $table = 'keywords';
	protected $fillable = [
        'word'
    ];

    public static function deleteKeyword($id)
    {
    	$keyword = Keyword::find($id);
		if ($keyword) {
			$keyword->delete();
			return "keyworddeleted";
		} else {
			return "keywordnotfound";
		}
    }

    public static function addKeyword($data)
    {
    	if (Keyword::where("word",$data["word"])->first()) {
    		return "keywordexists";
    	} else {
    		$keyword = new Keyword();
    		$keyword->word = $data["word"];
    		$keyword->save();
    		return "keywordadded";
    	}
    }

}