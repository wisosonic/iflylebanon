<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Purify extends Model  {

	public static function checkProfanity($text)
	{
		$checkurl = "http://api1.webpurify.com/services/rest/?api_key=c636f359fcfe42506d1fb3b52975b1ed&method=webpurify.live.replace&text=".urlencode($text)."&replacesymbol=*&format=json";
		$response = file_get_contents($checkurl);
		$response = json_decode($response, true);
		return $response["rsp"];
	}

}