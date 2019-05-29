<?php

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

	$query = mysqli_query($con,"SELECT * FROM `customer` WHERE `customer_id` =  '".$username."'");

	$find = mysqli_num_rows($query);

	echo $find;
	mysqli_close($con);

?>