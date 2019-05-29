<?php
	$con=mysqli_connect('localhost','root','root','project',8890);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	

	$query = "SELECT item_name FROM items";
	$result = mysqli_query($con,$query);
	$array = array();
	while($row = mysqli_fetch_array ($result)){
	$array[] = $row["item_name"];
	}
	$arrayp = json_encode($array);
	echo $arrayp;
	
	

		mysqli_close();


?>