<?php

session_start();
if($_POST['token']==$_SESSION['token']){
    print_r("Anti-CSRF");
}else{
    die("Invalid token");
}