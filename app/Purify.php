<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Purify extends Model  {

	public static function checkProfanity($text)
	{
		$checkurl = "http://api1.webpurify.com/services/rest/?api_key=d28c3ea208d28fd70ebfcf81995d317c&method=webpurify.live.replace&text=".urlencode($text)."&replacesymbol=*&format=json";
		$response = file_get_contents($checkurl);
		$response = json_decode($response, true);
		return $response["rsp"];
	}

}