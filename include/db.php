<?php 

$server="localhost";
$username="root";
$password="";
$database="loan";

$site_url = "https://localhost/admin";


$con=mysqli_connect($server,$username,$password,$database);

if(!$con)
{
	
	die("Connection Fail....".mysqli_connect_error());
	
}
date_default_timezone_set('Asia/Kolkata');

?> 
