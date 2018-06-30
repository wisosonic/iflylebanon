<?php

/**
 * Library Requirements
 *
 * 1. Install composer (https://getcomposer.org)
 * 2. On the command line, change to this directory (api-samples/php)
 * 3. Require the google/apiclient library
 *    $ composer require google/apiclient:~2.0
 */


/*
 * You can acquire an OAuth 2.0 client ID and client secret from the
 * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
 * For more information about using OAuth 2.0 to access Google APIs, please see:
 * <https://developers.google.com/youtube/v3/guides/authentication>
 * Please ensure that you have enabled the YouTube Data API for your project.
 */
$OAUTH2_CLIENT_ID = '232028853670-crrhrei08d5h2v4lea0n5sbiqribd1em.apps.googleusercontent.com';
$OAUTH2_CLIENT_SECRET = '2z6IXWt-ERnL13c1-3L3FDkC';
$REDIRECT = 'http://iflylebanon.com/test2';

$client = new Google_Client();
$client->setClientId($OAUTH2_CLIENT_ID);
$client->setClientSecret($OAUTH2_CLIENT_SECRET);
$client->setAccessType('offline');
$client->setScopes('https://www.googleapis.com/auth/youtube');

// $client->setRedirectUri($redirect);
// dd($client);
$client->setRedirectUri($REDIRECT);
$client->setApprovalPrompt("consent");
$client->setPrompt("consent");

// $accesstoken = DB::table('youtubeapi')->find(1);
// $client->refreshToken($accesstoken->token);
// $client->revokeToken();
// dd($client->getAccessToken());

// DB::table('youtubeapi')
//       ->where('id','=',1)
//       ->update(array("token"=> json_encode($client->getAccessToken())));
// dd($client->getAccessToken());

$htmlBody = "" ;
$youtube = new Google_Service_YouTube($client);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $client->refreshToken($client->getAccessToken());
  DB::table('youtubeapi')
      ->where('id','=',1)
      ->update(array("token"=> json_encode($client->getAccessToken())));
  header('Location: ' . $REDIRECT);
}

$accesstoken = DB::table('youtubeapi')->find(1);

if ($accesstoken->token != "null") {
  $client->setAccessToken($accesstoken->token);
  $client->refreshToken($accesstoken->token);
  DB::table('youtubeapi')
      ->where('id','=',1)
      ->update(array("token"=> json_encode($client->getAccessToken())));
}

if ($client->getAccessToken()) {
  try {
    $broadcastsResponse = $youtube->liveBroadcasts->listLiveBroadcasts(
        'id,snippet',
        array(
            'mine' => 'true',
        ));
    dd($broadcastsResponse['items'], $client->getAccessToken());
  } catch (Google_Service_Exception $e) {
  } catch (Google_Exception $e) {
  }
} else {

  // If the user hasn't authorized the app, initiate the OAuth flow
  $state = mt_rand();
  $client->setState($state);
  Session::put('state',$state);

  $authUrl = $client->createAuthUrl();
  $htmlBody = <<<END
  <h3>Authorization Required</h3>
  <p>You need to <a href="$authUrl">authorize access</a> before proceeding.<p>
END;
}
?>

<!doctype html>
<html>
<head>
<title>My Live Broadcasts</title>
</head>
<body>
  <?=$htmlBody?>
</body>
</html>