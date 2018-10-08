<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
use Google_Client;
use Google_Service_YouTube;

class Youtubeapi extends Model  {

	public static function getYoutubeObject()
	{
		$OAUTH2_CLIENT_ID = '232028853670-crrhrei08d5h2v4lea0n5sbiqribd1em.apps.googleusercontent.com';
		$OAUTH2_CLIENT_SECRET = '2z6IXWt-ERnL13c1-3L3FDkC';
		$REDIRECT = 'http://iflylebanon.com/test2';
		$client = new Google_Client();
		$client->setClientId($OAUTH2_CLIENT_ID);
		$client->setClientSecret($OAUTH2_CLIENT_SECRET);
		$client->setScopes('https://www.googleapis.com/auth/youtube');
		$client->setAccessType('offline');
		$client->setApprovalPrompt("consent");
		$client->setPrompt("consent");
		$client->setRedirectUri($REDIRECT);

		$accesstoken = DB::table('youtubeapi')->find(1);
		if ($accesstoken->token != "null") {
		  $client->setAccessToken($accesstoken->token);
		  $client->refreshToken($accesstoken->token);
		  DB::table('youtubeapi')
		      ->where('id','=',1)
		      ->update(array("token"=> json_encode($client->getAccessToken())));
		}
		$youtube = new Google_Service_YouTube($client);
		return $youtube;
		
	}

	public static function getAllChannelBroadcasts()
	{
		$youtube = self::getYoutubeObject();
		try {
		    $broadcastsResponse = $youtube->liveBroadcasts->listLiveBroadcasts(
		        'id,snippet',
		        array(
		            'mine' => 'true'
		        ));
		    return ($broadcastsResponse['items']);
		} catch (Google_Service_Exception $e) {
			return null;
		} catch (Google_Exception $e) {
			return null;
		}
	}

	public static function getActiveBroadcasts()
	{
		$youtube = self::getYoutubeObject();
		try {
		    $broadcastsResponse = $youtube->liveBroadcasts->listLiveBroadcasts(
		        'id,snippet',
		        array(
		            'broadcastStatus' => 'active'
		        ));
		    return ($broadcastsResponse['items']);
		} catch (Google_Service_Exception $e) {
			return null;
		} catch (Google_Exception $e) {
			return null;
		}
	}
	public static function getBroadcastById($id)
	{
		$youtube = self::getYoutubeObject();
		try {
		    $broadcastsResponse = $youtube->liveBroadcasts->listLiveBroadcasts(
		        'id,snippet',
		        array(
		            'id' => $id
		        ));
		    return ($broadcastsResponse['items']);
		} catch (Google_Service_Exception $e) {
			return null;
		} catch (Google_Exception $e) {
			return null;
		}
	}

	public static function getVideoURLById($id)
	{
		return "https://www.youtube.com/watch?v=".$id;
	}


}