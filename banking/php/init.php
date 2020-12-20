<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "banking_system";

$con = mysqli_connect($host, $user, $password, $db);

date_default_timezone_set('Asia/Kolkata');

if(! $con){
    echo "connection Error";
}