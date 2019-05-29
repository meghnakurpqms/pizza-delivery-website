<?php
	session_start();

  	DEFINE('DB_USERNAME', 'root');
    DEFINE('DB_PASSWORD', 'root');
    DEFINE('DB_HOST', 'localhost:8889');
    DEFINE('DB_DATABASE', 'Project');
    $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	
 	$query = mysqli_query($con,"SELECT `admin_password` FROM `admin` WHERE `admin_id` =  '".$username."'");
 	$row    = mysqli_fetch_assoc($query);
 	$_SESSION['user'] = "";
 	if($password == $row['admin_password'])
 	{
 		
 		echo ("1");
 		
 	}
 	else
 	{
 		
 		echo "0";
 	}
?>