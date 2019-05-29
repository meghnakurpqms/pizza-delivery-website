<!DOCTYPE html>
<html>
<head>
<title>Pizza Loco</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="css/admin.css" rel="stylesheet" type="text/css" media="all" /> -->
<!-- Custom Theme files -->

<meta name="viewport" content="width=device-width, initial-scale=1">

<!--webfont-->
<link href='https://fonts.googleapis.com/css?family=Architects Daughter' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<script type="text/javascript" src="js/loggedIn.js"></script>		
<script src="js/simpleCart.min.js"> </script>	

<script>

</script>

</head>

<body>
    <!-- header-section-starts -->
	<div class="header">
		<div class="container">
			<div class="top-header">
				<div class="logo">
					<p font-size:72px; display=inline;><img src="images/pizzaloca-logo.png" width="60" height="55" />
					Pizza Loca...</p>

				</div>
				<div class="header-right">
						<div class="cart box_1">
							<a href="checkout.php">
								<h3> Checkout<img src="images/bag1.png" alt=""></h3>
							</a>	
							
							<div class="clearfix"> </div>
						</div>
						<div class="logout" id="logout-link">
								Logout
						</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
			<div class="menu-bar">
			<div class="container">
				<div class="top-menu">
					<ul>
						<li><a href="index.html">Home</a></li>|
						<li><a href="pizza.php">Pizza</a></li>|
						<li><a href="contact.html">contact</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="login-section">
					<ul>
						<li><a href="login.html">Login</a>  </li> |
						<li><a href="register.html">Register</a> </li> |
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>



<?php

						session_start();
					$con=mysqli_connect('localhost','root','root','project',8889);
					
				    if (mysqli_connect_errno())
					{
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					}
					
					$username = $_SESSION["customer_id"];

	$sql1 = "SELECT * from customer_order where History=0 and customer_id='".$username."'";

						if ($res1 = mysqli_query($con, $sql1)) { 
						    if (mysqli_num_rows($res1) > 0) { 
						     
						        while ($row1 = mysqli_fetch_array($res1)) { 

						        	$qty = $row1["quantity"];
						      		$pizzaNow = $row1["pizza"];
						        	
						        
						        $sql3 = "UPDATE items SET Inventory=Inventory-".$qty." WHERE item_name ='".$pizzaNow."'";

						    
						        	if (mysqli_query($con, $sql3)) 
											{

								$sql2 = "UPDATE customer_order SET History=1 WHERE History = 0 and customer_id='".$username."'";
	

											if (mysqli_query($con, $sql2)) 
											{
												echo "<br><br><p id='usernamec'>Thank You! Your order is on its way.</p>";
											}

											else { 
											    echo "ERROR: Could not able to execute $sql. "
											                                .mysqli_error($con); 
											}


											}

									else { 
									    echo "ERROR: Could not able to execute $sql. "
									                                .mysqli_error($con); 
									} 
						        
						        } 
						        

								
						        mysqli_free_res($res); 
						    } 
						    
						    else 
						    { 
						        echo "<br><br><p id='usernamec'>No matching records are found.</p>"; 
						    } 
						} 
						else
						 { 
						    echo "ERROR: Could not able to execute $sql. "
						                                .mysqli_error($con); 
						} 


 

?>
</div>
</body>
</html>