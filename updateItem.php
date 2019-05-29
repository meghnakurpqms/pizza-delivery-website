<!DOCTYPE html>
<html>
<head>
<title>Pizza Loco</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/updateItem.js"> </script>
<script type="text/javascript" src="js/loggedIn.js"></script>	
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/admin.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--webfont-->
<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


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
						<li class="active"><a href="register.html">Register</a> </li> |
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<!-- header-section-ends -->
	<!-- content-section-starts -->
	<div class="content">
		<div class="container">
			<div class="tab">
				  <button class="tablinks active" onclick="updateItem(event, 'updatePizza')" id="pizzaTab">Update Pizza</button>
				  <button class="tablinks" onclick="updateItem(event, 'updateTopping')" id="toppingTab">Update Topping</button>
				  
			</div>

				<div id="updatePizza" class="tabcontent"  style="display:block;">
				  	<form id="updatePizzaForm" class="admin-form">
								
									<span>Pizza Name: </span>
									<select name="updatePizzaSelect" id="updatePizzaSelect">
									<?php
													DEFINE('DB_USERNAME', 'root');
												    DEFINE('DB_PASSWORD', 'root');
												    DEFINE('DB_HOST', 'localhost:8889');
												    DEFINE('DB_DATABASE', 'Project');
   													
    												$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
													$sql = mysqli_query($con, "SELECT * FROM `items`");
													$row = mysqli_num_rows($sql);
													
													while ($row = mysqli_fetch_array($sql)){
														echo '<option value="'.$row['item_name'].'">'.$row['item_name'].'</option>';

													}
												?> 
									</select>
									
									<input type="text" name="pizzaname" id="pizzaname">
									<span class="error" id="pizzanameerror"> </span>
								
									<span>Pizza Type<label>*</label></span>
									<input type="text" name="pizzatype" id="pizzatype">
									<span class="error" id="pizzatypeerror"> </span>
									
									<span>Pizza Image</span>

									<input type="file" name="file" id="file" accept="images/*">
									<img src="" id="pizzaimage" />
									<button type="button" id="pizzaUpdate" class="admin-btn">Update</button>
				    			</form>
				</div>

				<div id="updateTopping" class="tabcontent">
				<form method="post" id="updateToppingForm" class="admin-form">
									<span>Topping Name: </span>
										<select name="updateToppingSelect" id="updateToppingSelect">
											
												<?php
													DEFINE('DB_USERNAME', 'root');
												    DEFINE('DB_PASSWORD', 'root');
												    DEFINE('DB_HOST', 'localhost:8889');
												    DEFINE('DB_DATABASE', 'Project');
   													
    												$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
													$sql = mysqli_query($con, "SELECT * FROM `toppings`");
													$row = mysqli_num_rows($sql);
													
													while ($row = mysqli_fetch_array($sql)){
														echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
													}
												?> 
										</select>
									
									<input type="text" name="toppingname" id="toppingname">
									<span class="error" id="toppingnameerror"> </span>
								
									<span>Topping Type<label>*</label></span>
									<input type="text" name="toppingtype" id="toppingtype">
									<span class="error" id="toppingtypeerror"> </span>

									<span>Topping Cost<label>*</label></span>
									<input type="text" name="toppingcost" id="toppingcost">
									<span class="error" id="toppingcosterror"> </span>
									

					  				<button type="button" id="toppingUpdate" class="admin-btn">Update Item</button>
				    			</form>
					
				  </div>

			
		</div>
	</div>
	

</body>
</html>