<?php
session_start();
$con=mysqli_connect('localhost','root','root','project');
	//'project',8889
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	$pizzaname = $_POST["pizza"];
	$_SESSION['pizza']=$pizzaname;
?>
