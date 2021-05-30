<?php
session_start();

require "google-api-php-client--PHP5.6/vendor/autoload.php";
$clientID = '27871397094-debcshjm9cihnln4bl8a3jscp72oeoeu.apps.googleusercontent.com';
$clientSecret = 'Y5Uk3LBujg4Nm77DZqffn5mV';

//$clientID = '422098523004-a9ms8u68jtq1mgjb2h2a7126mkbhr4dc.apps.googleusercontent.com';
//$clientSecret = 'x2ANYmYHvLW3RhuPyHvQYQG9';
$port=9656;
$aUrl = 'http://localhost:'.$port.'/google-login/login-call.php';
$redirectUri = $aUrl;

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->authenticate($_GET['code']);
    $_SESSION['authenticate'] = $token;
    $client->setAccessToken($token['access_token']);
    $q = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token='.$token['access_token'];
    $json = file_get_contents($q);
    $userInfoArray = json_decode($json);
//    var_dump($userInfoArray);die;  //
    $_SESSION['userInfo'] = $userInfoArray;
    //
    header('location: info.php');
}else{
    header('location: login.php');
}


