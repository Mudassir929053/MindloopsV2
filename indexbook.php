<?php
//initialize facebook sdk
require 'vendor-facebook/autoload.php';
// session_start();
$fb = new Facebook\Facebook([
'app_id' => '1465827097534353', // your app id
'app_secret' => '65c7bc038b89035171dbf4dbf7d0b91f', // your app secret
'default_graph_version' => 'v2.5',
]);
$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // optional
$loginUrl = $helper->getLoginUrl('https://mindloops.org/', $permissions);
try {
if (isset($_SESSION['facebook_access_token'])) {
$accessToken = $_SESSION['facebook_access_token'];
} else {
$accessToken = $helper->getAccessToken();
}
} catch(Facebook\Exceptions\facebookResponseException $e) {
// When Graph returns an error
echo 'Graph returned an error: ' . $e->getMessage();
exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
// When validation fails or other local issues
echo 'Facebook SDK returned an error: ' . $e->getMessage();
exit;
}
if (isset($accessToken)) {
if (isset($_SESSION['facebook_access_token'])) {
$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
} else {
// getting short-lived access token
$_SESSION['facebook_access_token'] = (string) $accessToken;
// OAuth 2.0 client handler
$oAuth2Client = $fb->getOAuth2Client();
// Exchanges a short-lived access token for a long-lived one
$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
// setting default access token to be used in script
$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
}
// redirect the user to the profile page if it has "code" GET variable
if (isset($_GET['code'])) {
    // echo "here amir"; 
    // exit;
    header('Location: profilebook.php');
}
// getting basic info about user
try {
    // echo "I am here1111";
    // exit;
$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
$requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture
$picture = $requestPicture->getGraphUser();
$profile = $profile_request->getGraphUser();
$fbid = $profile->getProperty('id');           // To Get Facebook ID
$fbfullname = $profile->getProperty('name');   // To Get Facebook full name
$fbemail = $profile->getProperty('email');    //  To Get Facebook email
$fbpic = "<img src='".$picture['url']."' class='img-rounded'/>";
# save the user nformation in session variable
$_SESSION['fb_id'] = $fbid;
$_SESSION['fb_name'] = $fbfullname;
$_SESSION['fb_email'] = $fbemail;
$_SESSION['fb_pic'] = $fbpic;
$_SESSION['fb_picture'] = $picture['url'];

} catch(Facebook\Exceptions\FacebookResponseException $e) {
// When Graph returns an error
echo 'Graph returned an error: ' . $e->getMessage();
session_destroy();
// redirecting user back to app login page
header("Location: ./");
exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
// When validation fails or other local issues
echo 'Facebook SDK returned an error: ' . $e->getMessage();
exit;
}
} 
?>