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
<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

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
	<!-- header-section-ends -->
	<!-- content-section-starts -->
	<!-- checkout -->
 	<div class="cart-items">
		<div class="container">

				<input type="submit" class="btn btn-success" id ="AddMore" onclick= "location.href='/end.php';" value="Confirm">

			<!-- <div class="tab-content"> -->
			<div id="cartItems" style="display:block;">
				
				<br><br>
				
			<?php
				
					session_start();
					$con=mysqli_connect('localhost:8889','root','root','project');
					
				    if (mysqli_connect_errno())
					{
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					}
					echo "<div id='divbacks'>";
					$username = $_SESSION["customer_id"];
					echo "&nbsp &nbsp <h2 align-self: center;>&nbsp &nbsp &nbsp<img src='/css/images/pizzaloca-logo.png' width='60' height='50'>&nbsp &nbsp &nbsp &nbsp <u>Payment Confirmation for ".$username."</u></h2>";
					//echo "<p id='usernamec'>Hello ".$username."</p>";
					$total = 0;
					$pizzaCart = 0;
					$qty = 0;

					if($username!= null || $username!= "")
					{

						$sql = "SELECT * FROM customer_order co INNER JOIN items i ON co.Pizza = i.item_name INNER JOIN customer c on co.customer_id= c.CUSTOMER_ID where co.History='0' and co.customer_id = '".$username."'";
						//echo $sql;

						if ($res = mysqli_query($con, $sql)) { 
						    if (mysqli_num_rows($res) > 0) { 
						        echo"<hr>";
						        echo "<br><br>";
						        echo "<table  width=100% text-align:'center'>";
						        while ($row = mysqli_fetch_array($res)) { 

						        	$pizza = $row["pizza"];
						        	$pizzaCart = $row["pizza"];

						        	
						        	echo "<tr id='finalcart'><td ><u>Pizza</u></td><td><u>Cost</u></td></tr>";
						        	echo "<tr id='finalcart'><td>".$row["pizza"]."</td><td text-align='right'>$".$row['price'].'</td></tr>';
						        	$total = $total + $row['price'];
						        } 
						        

						        echo "</table></br></br><hr>";
						        echo "<p id='totalcart'>Total: $".$total."</p>";

						  		//  echo "Shipping Address: ";
								// echo $row["Address_Line1"];
								
								mysqli_free_res($res); 
								echo "</div>";
						    } 
						    
						    else 
						    { 
						        echo "<p id='usernamec'>No Items in the cart</p>"; 
						    } 
						} 
						else
						 { 
						    echo "ERROR: Could not able to execute $sql. "
						                                .mysqli_error($con); 
						} 



					}

			// echo "<br>";
			// echo "<br>";
			
			// echo "Total Amount: ";
			// echo $total;

			// echo "<br>";
			// echo "<br>";
			
			// echo "Shipping Address: ";
			// echo $row["Address_Line1"];
			// echo "</form>";
?>

</div>

</div>


	</div>
	</div>

	<!-- content-section-ends-->
</body>
</html>