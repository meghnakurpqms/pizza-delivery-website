<!DOCTYPE html>
<html>
<head>
<title>PIZZA LOCO</title>
<!-- Custom Theme files -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<!-- <link href="css/admin.css" rel="stylesheet" type="text/css" media="all" /> -->


<script type="text/javascript" src="js/order.js"></script>
<script type="text/javascript" src="js/loggedIn.js"></script>

<script src="js/simpleCart.min.js"> </script>

<script>

	function updateItem(evt, itemName) {
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
	<div class="container" style="display:block;">
	<div id="searchPizza">


		<div class="tab">
					

<input type="submit"  class="btn btn-primary" id ="Go Back" onclick= "location.href='/pizza.php';" value="Go Back">
	
	
	<button class="tablinks" onclick="updateItem(event, 'updateVegPizza')" id="veg" background-color='green'; padding= 10px 24px;border-radius=8px;
	color=white;>Vegetarian</button>
				  <button class="tablinks" onclick="updateItem(event, 'updateNonvegPizza')" id="nonveg">Non Vegetarian</button>

				  
			</div>
	
	 

				  
	 
	 
	<div id="updateVegPizza" class="tabcontent">

	<?php

	session_start();
	$con=mysqli_connect('localhost','root','root','project',8889);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$searchTerm = $_POST["searchbox"];
	$searchTerm = trim($searchTerm);


	$sql = "SELECT item_name,item_imagename FROM items where item_type='Vegetarian' and Inventory>0 and item_name LIKE '%".$searchTerm."%'";
					 	$inc = 1;
					 	if ($res = mysqli_query($con, $sql)) { 
					 	    if (mysqli_num_rows($res) > 0) { 
					        echo "<table width=50%>"; 
					 	        while ($row = mysqli_fetch_array($res)) { 
					 	            echo "<tr>"; 
					 	            
						            echo '<td><p class="result" id="result'.$inc++.'">'.$row['item_name']."</td>"; 
					   echo '<td><img src="images/pizzas/'. $row["item_imagename"]. '" alt="'. $row["item_imagename"]. '" style="width:10em;height:10em;"></td>';
					   echo '<td><input type="button" value="Order Now" class="order" id="order1"></td>';
					 echo "</tr>"; 
					  } 
					  echo "</table>"; 
					   mysqli_free_res($res); 
					} 

					   // else 
					   // { 
					   // echo "No matching records are found."; 
					   //  } 
					} 
					 	else { 
					 	    echo "ERROR: Could not execute $sql. " .mysqli_error($con); 
						
					}
														

	mysqli_close();

	?>
	</div>
	
	<div id="updateNonvegPizza" class="tabcontent">

	<?php
	session_start();
	$con=mysqli_connect('localhost','root','root','project',8889);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$searchTerm = $_POST["searchbox"];
	$searchTerm = trim($searchTerm);


	$sql = "SELECT item_name,item_imagename FROM items where item_type='Non Vegetarian' and Inventory>0 and item_name LIKE '%".$searchTerm."%'";
					 	$inc = 1;
					 	if ($res = mysqli_query($con, $sql)) { 
					 	    if (mysqli_num_rows($res) > 0) { 
					        echo "<table width=50%>"; 
					 	        while ($row = mysqli_fetch_array($res)) { 
					 	            echo "<tr>"; 
					 	            
						            echo '<td><p class="result" id="result'.$inc++.'"><b>'.$row['item_name']."</b></td>"; 
					   echo '<td><img src="images/pizzas/'. $row["item_imagename"]. '" alt="'. $row["item_imagename"]. '" style="width:10em;height:10em;"></td>';
					   echo '<td><input type="button" value="Order Now" class="order" id="order1"></td>';
					 echo "</tr>"; 
					  } 
					  echo "</table>"; 
					   mysqli_free_res($res); 
					} 

					   // else 
					   // { 
					   // echo "No matching records are found."; 
					   //  } 
					} 
					 	else { 
					 	    echo "ERROR: Could not execute $sql. " .mysqli_error($con); 
						
					}
														
	mysqli_close();

	?>

	</div>
	</div>
		</div>
		</div>
	</div>
	</body>
	</html>
