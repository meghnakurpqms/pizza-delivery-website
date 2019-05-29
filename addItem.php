<?php
	define("DOC_ROOT", $_SERVER['DOCUMENT_ROOT']."/");
	define("IMG_UPLOADS", DOC_ROOT."images/pizzas/");
  	DEFINE('DB_USERNAME', 'root');
    DEFINE('DB_PASSWORD', 'root');
    DEFINE('DB_HOST', 'localhost:8889');
    DEFINE('DB_DATABASE', 'Project');
    $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	
	$type = $_POST["type"];
	
	if($type == "pizza")
	{
		$pizzaname = $_POST["pizzaname"];
		
		$pizzatype = $_POST["pizzatype"];
		$pizzaimage = $_POST["pizzaimage"];
		$sql = mysqli_query($con, "SELECT * FROM `items` where isdeleted='1'");
		$row = mysqli_num_rows($sql);		
		
			if($row>0)
			{				
		while ($row = mysqli_fetch_array($sql)){
			if($row['item_name']==$pizzaname)
				{
					//echo "<script type='text/javascript'>alert($pizzaname);</script>";
					$query1 = mysqli_query($con, "UPDATE `items` SET isdeleted='0' where item_name='$pizzaname'");
				}

			}
		}
		else
		{
		
			$query = mysqli_query($con,"INSERT INTO items VALUES ('$pizzaname','$pizzaimage','$pizzatype','0','5')");
		
		}
		
		
		//INSERT INTO items VALUES ('$pizzaname','$pizzaimage','$pizzatype','0')
	}
	
	

	else if($type == "topping")
	{
		$toppingname = $_POST["toppingname"];
		$toppingtype = $_POST["toppingtype"];
		if($toppingtype == "vegetarian")
		{
			$toppingtypeid = 0;
		}
		else
		{
			$toppingtypeid = 1;
		}
		$toppingcost = floatval($_POST["toppingcost"]);
		$query = mysqli_query($con,"INSERT INTO `toppings` VALUES ('$toppingname','$toppingcost','$toppingtype','0')");

	}
	else
	{
		echo "0";
	}
	
 	
 	
?>