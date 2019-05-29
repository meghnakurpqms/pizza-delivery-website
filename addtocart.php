<?php
session_start();
$conn=mysqli_connect('localhost:8889','root','root','project');
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}

	$crust = $_POST["crust"];	
	$pizza = $_POST["pizza"];
	$price = $_POST["price"];
	$quantity = $_POST["quantity"];
	$toppings = $_POST["toppings"];
	$size = $_POST["size"];
	$customer_id = $_POST["user"];


	$_SESSION["customer_id"] = $customer_id;

$sql = "INSERT INTO customer_order ". "(customer_id,crust,pizza,price,quantity,toppings,size,History) "."VALUES('$customer_id','$crust','$pizza','$price','$quantity','$toppings','$size','0')";
               


if (mysqli_query($conn, $sql)) {
	echo ("1");
 		
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


            
mysqli_close($conn);

?>