<?php
	define("DOC_ROOT", $_SERVER['DOCUMENT_ROOT']."/");
	define("IMG_UPLOADS", DOC_ROOT."images/pizzas/");
  	DEFINE('DB_USERNAME', 'root');
    DEFINE('DB_PASSWORD', 'root');
    DEFINE('DB_HOST', 'localhost:8889');
    DEFINE('DB_DATABASE', 'Project');
    $added = 0;
    $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	
	$type = $_POST["type"];
	
	if($type == "pizza")
	{
		$pizzaname = $_POST["pizzaname"];
		$query = mysqli_query($con,"UPDATE`items` SET isdeleted='1' WHERE `item_name`='$pizzaname'");	
	}

	if($type == "topping")
	{
		$toppingname = $_POST["toppingname"];
		$query = mysqli_query($con,"UPDATE `toppings` SET isdeleted='1' WHERE `name`='$toppingname'");
	}
	
 	
 	
?>