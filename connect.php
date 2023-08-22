<?php
$servername ="localhost";
$username = "cyberzsa_gymsoftware";
$password ="gymsoftware";
$dbname = "cyberzsa_gymsoftware";


$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
	 die("connection failed " . mysqli_connect_error());
}
date_default_timezone_set('Asia/Kolkata');

//date_default_timezone_set('America/Los_Angeles');
?>