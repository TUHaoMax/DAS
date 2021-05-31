<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php
session_start();

if(!isset($_SESSION['authenticate'])){
    header('location: login.php');
    exit();
}

$user = $_SESSION['userInfo'];
//print_r($user);
?>
<form action="CSRFtest.php" method="post">
    <img src="<?php echo $user->picture; ?>" alt="avatar">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="<?php echo $user->name ?>" readonly>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email" value="<?php echo $user->email ?>" readonly>
    </div>
    <div class="form-group">
        <!--<input type="hidden" name="token" value="feww"/>-->
        <input type="hidden" name="token" value="<?=$_SESSION['token']?>"/>
      <input type="text" id="CSRFtest" name="CSRFtest"/>
    </div>
    <div class="form-group">
        <input type="submit"  class="btn btn-primary btn-block" value="Submit"/>

        <a href="login.php?type=logout" class="btn btn-primary btn-block">Logout</a>
    </div>
</form>
</body>
</html>
