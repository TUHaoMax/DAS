<?php

session_start();
if (isset($_GET['type'])&&$_GET['type']=='google'){
    require "google-api-php-client--PHP5.6/vendor/autoload.php";
    $clientID = '27871397094-debcshjm9cihnln4bl8a3jscp72oeoeu.apps.googleusercontent.com';
    $clientSecret = 'Y5Uk3LBujg4Nm77DZqffn5mV';


    $port=3618;
    $aUrl = 'http://localhost:'.$port.'/google-login/login-call.php';
    $redirectUri = $aUrl;

    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");

    $loginUrl = $client->createAuthUrl();
    header("location: $loginUrl");
}
if(empty($_SESSION['token'])){
    $_SESSION['token']=bin2hex(random_bytes(32));
}
##print_r($_SESSION['token']);

if (isset($_GET['type'])&&$_GET['type']=='logout'){

    session_reset();
}

?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="27871397094-debcshjm9cihnln4bl8a3jscp72oeoeu.googleusercontent.com">
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body style="padding: 30px">
<h1>Login Page</h1>
<form action="#" method="post">
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-block btn-primary">Login</button>
        <a href="login.php?type=google" data-onsuccess="onSignIn" class="btn btn-block btn-default">Google Login</a>
    </div>
</form>
</body>
</html>

