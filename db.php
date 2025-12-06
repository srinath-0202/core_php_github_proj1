<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "proj_1";

$conn = mysqli_connect($servername,$username,$password,$databasename);

if($conn->connect_error)
{
	die("Connection Failed " .$conn->connect_error);
}

date_default_timezone_set('Asia/Kolkata');

$date = date('Y-m-d H:i:s');


?>