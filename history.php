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

	</div>


	<div class="cart-items">
		<div class="container">
	<div id="orderHistory" style="display:block;"> 
				 <?php 
					 session_start();
					 $con=mysqli_connect('localhost','root','root','project',8889);
					
				 if (mysqli_connect_errno())
					{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();

					 }
					
					$username = $_SESSION["customer_id"];

					

					if($username!= null || $username!= "")
					 {
					$sql =  "SELECT * FROM customer_order co INNER JOIN items i ON co.Pizza = i.item_name  inner join customer c on co.customer_id= c.CUSTOMER_ID where co.History >= '1' and co.customer_id = '".$username."'";

						
					 	if ($res = mysqli_query($con, $sql)) { 
					 	    if (mysqli_num_rows($res) > 0) { 
					        echo "<table width=50% class='table table-dark' id='historytable'>"; 
							   echo "<thead class='thead-dark'>";
								echo "<tr>"; 
					 	        echo "<th>Customer</th>"; 
					 	        echo "<th>Pizza</th>"; 
						        echo "<th>Image</th>";
					 	        echo "<th>Price</th>"; 
								 echo "</tr>"; 
								 echo "</thead>";
					 	        while ($row = mysqli_fetch_array($res)) { 
					 	            echo "<tr>"; 
					 	            echo "<td>".$row['customer_id']."</td>"; 
						            echo "<td>".$row['pizza']."</td>"; 
					   echo '<td><img src="images/pizzas/'. $row["item_imagename"]. '" alt="'. $row["item_imagename"]. '" style="width:10em;height:10em;"></td>';
					   echo "<td>$".$row['price']."</td>"; 
					 echo "</tr>"; 
					  } 
					  echo "</table>"; 
					  
					   mysqli_free_res($res); 
					} 
					   else { 
					   echo "<p id='usernamec'>No orders in the past</p>"; 
					    } 
					} 
					 	else { 
					 	    echo "ERROR: Could not able to execute $sql. " .mysqli_error($con); 
						
					}
												
						
					 }

					mysqli_close();
				?> 
				</div> 
				</div>
				</div>

	</body>
	</html>