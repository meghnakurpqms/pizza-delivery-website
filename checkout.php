<!DOCTYPE html>
<html>
<head>
<title>Pizza Loca</title>
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
	<table width=100%><tr>
	<?php
				
				session_start();
				$username = $_SESSION["customer_id"];
				echo "&nbsp &nbsp <p id='usernamec'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Cart Items of ".$username."</p>";
	echo "<br>";

				//echo "<p id='usernamecheck'>USER:".$username."</p><br>";
				
	?>
	<hr>
	<p id='usernamec'>Options</p>
	<br>
	<td><input type="submit" class="btn btn-success" id ="AddMore" onclick= "location.href='/pizza.php';" value="Add More Items"></td>
	<td><input type="submit" class="btn btn-success" onclick= "location.href='/history.php';" id ="History" value="Order History"></td>
	<td><input type="submit" class="btn btn-success" onclick= "location.href='/payment.php';" id ="Payment" value="Continue to Pay"></td>


</tr>
</table>
	
			<!-- <div class="tab-content"> -->
			<div id="cartItems" style="display:block;">
				
				
				<?php
			
			
					//echo '<input type="submit" class="btn btn-success" id ="AddMore" onclick='. 'location.href="/pizza.php";'.'value="Add More Items">';
					$con=mysqli_connect('localhost:8889','root','root','project');
					
				    if (mysqli_connect_errno())
					{
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					}
					
					


					if($username!= null || $username!= "")
					{

						$sql = "SELECT * FROM customer_order co INNER JOIN items i ON co.Pizza = i.item_name  inner join customer c on co.customer_id= c.CUSTOMER_ID where co.History='0' and co.customer_id = '".$username."'";

						echo "<br>";
						echo "<hr>";
						//echo "<p id='usernamec'>Update/Delete</p><br>";
						if ($res = mysqli_query($con, $sql)) { 
						    if (mysqli_num_rows($res) > 0) { 

								
								echo "<table width=50%; align_self=center><tr>";
 								echo "<form action='removeFromCart.php' method='POST'>";
						        echo '<td><input name="delete" type="SUBMIT" class="btn btn-danger" id="delete" value="Delete"></td>';
						       //echo "<br><br>";
								echo '<td><input name="update" type="SUBMIT" class="btn btn-danger" id="update" value="Update"></td>';
								echo "</tr></table>";
								echo "<hr>";
								echo "<br>";
								echo "<p id='usernamec'>Cart Items</p><br>";
								echo "<div id='divback2'>";
								
								echo "<table class='table' id='carttable'>";
						        	echo "<thead class='thead-dark'><tr><th>Check</th><th>Pizza</th><th>Price</th></tr></thead>";
						        while ($row = mysqli_fetch_array($res)) { 



						        	$pizza = $row["pizza"];

						        	//echo $pizza;
						        	
						        	echo '<tr class="cartclass" ><td><input type="checkbox" name="checkbox[]" value="'.$pizza.'"></td>'."<td>".$row["pizza"]."</td>".'<td>$'.$row['price'].'</td></tr>';
						        	//echo  "<td>".$row["pizza"]."</td>";
						        	//echo '<td>'.$row['price'].'</td></tr>';
						        } 
						         
						        mysqli_free_res($res); 
						    
						    } 
						    else 
						    { 
						        echo "<p id='usernamec'>No items in the cart</p>"; 

						    } 


						} 
						
						else 
						{ 
						    echo "ERROR: Could not able to execute $sql. "
						                                .mysqli_error($con); 
						} 
						echo "</div>";
					}
echo "</form>";
					
?>

</div>

</div>


	</div>
	</div>

	<!-- content-section-ends-->
</body>
</html>