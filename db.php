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


?>