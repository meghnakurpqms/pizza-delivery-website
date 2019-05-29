<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//$price=0.00;
//echo $price;
//$_SESSION['price'] = $price;

	//$_SESSION['price'] = $price;


	//$_SESSION['price'] = $price;


	//$_SESSION['price'] = $price;


?>
<!DOCTYPE html>
<html>
<head>
<title>Pizza Loco</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/admin.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--webfont-->
<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


<script type="text/javascript" src="js/loggedIn.js"></script>		
<script src="js/simpleCart.min.js"> </script>	
<script>
	
	function updateCheckout(evt, itemName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(itemName).style.display = "block";
    evt.currentTarget.className += " active";
}

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
			<div class="tab">
				  <button class="tablinks active" onclick="updateCheckout(event, 'cartItems')">Cart Items</button>
				  <button class="tablinks" onclick="updateCheckout(event, 'orderHistory')">Order History</button>
				  
			</div>
			<div id="cartItems" class="tabcontent" style="display:block;">
				<?php
					session_start();
					$con=mysqli_connect('localhost','root','root','project',8889);
					
				    if (mysqli_connect_errno())
					{
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					}
					
					$username = $_SESSION['user'];

					if($username!= null || $username!= "")
					{
						$checkout = 0;
						$query2 = "SELECT * FROM `customer_order`  NATURAL JOIN `items` WHERE `customer_id`='$username' AND `check_out`='$checkout'";
						
						$result2 = mysqli_query($con,$query2);
						
						$inc = 1;
						echo '<table>';
						while(($row1 = mysqli_fetch_array ($result2))){
							echo '<tr>';
							echo '<td><p class="result" id="result'.$inc++.'">'.$row1["item_name"].'</p></td>';
							echo '<td><img src="images/pizzas/'. $row1["item_imagename"]. '" alt="'. $row1["item_imagename"]. '" style="width:10em;height:10em;"></td>';
							echo '</tr>';
							echo '</table>';	
						}
						mysqli_close();
					}
				?>
			</div>
			<div id="orderHistory" class="tabcontent">
				<?php
					session_start();
					$con=mysqli_connect('localhost','root','root','project',8889);
					
				    if (mysqli_connect_errno())
					{
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					}
					
					$username = $_SESSION['user'];
					if($username!= null || $username!= "")
					{
						$checkout = 1;
						$query2 = "SELECT * FROM `customer_order`  NATURAL JOIN `items` WHERE `customer_id`='$username' AND `check_out`='$checkout'";
						
						$result2 = mysqli_query($con,$query2);
						
						$inc = 1;
						echo '<table>';
						while(($row1 = mysqli_fetch_array ($result2))){
							echo '<tr>';
							echo '<td><p class="result" id="result'.$inc++.'">'.$row1["item_name"].'</p></td>';
							echo '<td><img src="images/pizzas/'. $row1["item_imagename"]. '" alt="'. $row1["item_imagename"]. '" style="width:10em;height:10em;"></td>';
							echo '</tr>';	
						}
						echo '</table>';
					}
					mysqli_close();
				?>
			</div>
		 </div>
	</div>

	
	<!-- content-section-ends -->
	
</body>
</html>