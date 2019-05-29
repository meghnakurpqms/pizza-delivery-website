<!DOCTYPE html>
<html>
<head>
<title>Pizza Loco</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/deleteItem.js"> </script>	
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
	
	function deleteItem(evt, itemName) {
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
				  <button class="tablinks active" onclick="deleteItem(event, 'deletePizza')">Delete Pizza</button>
				  <button class="tablinks" onclick="deleteItem(event, 'deleteTopping')">Delete Topping</button>
				  
			</div>

				<div id="deletePizza" class="tabcontent" style="display:block;">
				  			
								<form id="deletePizzaForm" class="admin-form">
								
									<span>Pizza Name: </span>
									<select name="to_user1">
									<?php
													DEFINE('DB_USERNAME', 'root');
												    DEFINE('DB_PASSWORD', 'root');
												    DEFINE('DB_HOST', 'localhost:8889');
												    DEFINE('DB_DATABASE', 'Project');
   													
    												$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
													$sql = mysqli_query($con, "SELECT * FROM `items` where isdeleted='0'");
													$row = mysqli_num_rows($sql);
													
													while ($row = mysqli_fetch_array($sql)){
														echo '<option value="'.$row['item_name'].'">'.$row['item_name'].'</option>';
													}
												?> 
									</select>
									<button type="button" id="pizzaDelete" class="admin-btn">Delete Item</button>
				    			</form>
			   			
				</div>

				<div id="deleteTopping" class="tabcontent">
							<form method="post" id="deleteToppingForm" class="admin-form">
									<span>Topping Name: </span>
										<select name="to_user2">
											
												<?php
													DEFINE('DB_USERNAME', 'root');
												    DEFINE('DB_PASSWORD', 'root');
												    DEFINE('DB_HOST', 'localhost:8889');
												    DEFINE('DB_DATABASE', 'Project');
   													
    												$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
													$sql = mysqli_query($con, "SELECT name,cost,type FROM toppings where isdeleted='0'");
													$row = mysqli_num_rows($sql);
													
													while ($row = mysqli_fetch_array($sql)){
														echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
													}
												?> 
										</select>
									
									

					  				<button type="button" id="toppingDelete" class="admin-btn">Delete Item</button>
				    			</form>
				  </div>

			
		</div>
	</div>
	

</body>
</html>
<