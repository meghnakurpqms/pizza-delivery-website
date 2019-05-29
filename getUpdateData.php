<?php
if (ISSET($_POST)) 
{
	$type_item = $_POST['type'];
    $item_name = $_POST['name'];

    DEFINE('DB_USERNAME', 'root');
    DEFINE('DB_PASSWORD', 'root');
    DEFINE('DB_HOST', 'localhost:8889');
    DEFINE('DB_DATABASE', 'Project');
    $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if (mysqli_connect_errno())
	{

	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	
	if($type_item == "pizza")
	{
	 	$query = mysqli_query($con,"SELECT name,cost,type FROM `items` WHERE `item_name` =  '".$item_name."'");
	    
	    while ($row = mysqli_fetch_assoc($query))
	    {
		    $name = $row['item_name'];
		    $type = $row['item_type'];
		    $image = $row['item_imagename'];
		    $json = array('name' => $name, 'type' => $type, 'image' => $image);
	   		 echo json_encode($json);
		}
		
	}
	if($type_item == "topping")
	{
	 	$query = mysqli_query($con,"SELECT name,cost,type FROM `toppings` WHERE `name` =  '".$item_name."'");
	    
	    while ($row = mysqli_fetch_assoc($query))
	    {
		    $toppingname = $row['name'];
		    $toppingtype = $row['type'];
		    $toppingcost = $row['cost'];
		    if($toppingtype =="0")
		    	$toppingtype = "vegetarian";
		    else
		    	$toppingtype = "non vegetarian";
		    
		    $json = array('toppingname' => $toppingname, 'toppingtype' => $toppingtype, 'toppingcost' => $toppingcost);
	   		echo json_encode($json);
		}
		
	}
}
?>