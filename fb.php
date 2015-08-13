<?php 

include 'config.php';

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  	// Now you can redirect to another page and use the
  	// access token from $_SESSION['facebook_access_token']

  // Logged in
// echo '<h3>Access Token</h3>';
// var_dump($accessToken->getValue());
// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

$response = $fb->get('/me?fields=id,name', $accessToken->getValue());
$user = $response->getGraphUser();


$profile_pic =  "http://graph.facebook.com/".$user['id']."/picture?width=1000&height=1000";

 //echo the image out

$online_image = $profile_pic;
$image = "images/".$user['id'].'.jpeg';

copy($online_image, $image);

$image_path = create_image($image);


header('location: share.php?path='.$image_path);
}