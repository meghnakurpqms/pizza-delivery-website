<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$price=0.00;
echo $price;
$_SESSION['price'] = $price;

	//$_SESSION['price'] = $price;


	//$_SESSION['price'] = $price;


	//$_SESSION['price'] = $price;


?>
<head>
<title>PIZZA LOCO</title>
<!-- Custom Theme files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--webfont-->
<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

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
							<a id='checkouttag' href="checkout.php"><img src="images/bag1.png" alt="">Checkout</a>
								
								<?php
								//session_start();
								$prices=$_SESSION['price'];
								echo $price;
								
								?>
							</a>	
							
							<div class="clearfix"> </div>
							
						</div>
					</div>
				<div class="clearfix"></div>
			</div>
		</div>
			<div class="menu-bar">
			<div class="container">
				<div class="top-menu">
					<ul>
						<li class="active"><a href="index.html">Home</a></li>|
						<li><a href="pizza.php">Pizza</a></li>|
						
						<li><a href="contact.html">Contact</a></li>
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

	<div class="container">
	<br>
</body>