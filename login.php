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

	
 	$query = mysqli_query($con,"SELECT `password` FROM `customer` WHERE `customer_id` =  '".$username."'");
 	$row    = mysqli_fetch_assoc($query);
 	
 	if(password_verify($password, $row['password']))
 	{
 		 $_SESSION['user'] = $username;
 		 
 		
 	}
 	else
 	{
 		$_SESSION['user'] = "";
 		echo ("0");
 	}
?>