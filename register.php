<?php

$servername = "localhost";
$username = "root";
$password = "root";
$db = "project";


$conn = mysqli_connect($servername,$username,$password,$db);
if(!$conn)
{
	die("Connection failed: ".mysqli_connect_error());
}


	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$phonenumber = $_POST["phonenumber"];
	$email = $_POST["email"];
	$address1 = $_POST["address1"];
	$address2 = $_POST["address2"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zipcode = $_POST["zipcode"];


	
	$username = $_POST["username"];
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $sql = "INSERT INTO Customer ". "(customer_id,password,firstname,lastname,email,phone,address_line1,address_line2,city,state, zipcode) ". "VALUES('$username','$password','$firstname','$lastname','$email','$phonenumber','$address1','$address2','$city','$state','$zipcode')";
			mysqli_close($sql);  
            
// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }


            
            mysqli_close($conn);


?>
