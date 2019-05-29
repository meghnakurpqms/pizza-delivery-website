
<?php

	include "header.php";
	// print_r($_POST);

	$sizecost=0;
	$pizzacost = 2; // From table
	if($_POST["size"]){
		$sizecost = 1;
	}

	else{
		$sizecost = 10;
	}	

	$topping_cost = 0;
	foreach ($_POST["topping"] as $topping) {
		// get topping cost in topping
    	$topping_cost = $topping_cost + 1;
	}

	$price = $sizecost + $pizzacost * $_POST["quantity"]+$topping_cost;


	echo "<div id='divback'>";
	echo "<br>";
	echo "<br>";
	echo "&nbsp &nbsp <h2 align-self: center;>&nbsp &nbsp &nbsp<img src='/css/images/pizzaloca-logo.png' width='60' height='50'>&nbsp &nbsp &nbsp &nbsp <u>Your Selection</u></h2>";
	echo "<br>";
	$crust = $_POST["crust"];
	
	if($crust==1)
	{$cruststring="Thin Crust";}
	if($crust==2)
	{$cruststring="Pan";}
	if($crust==3)
	{$cruststring="Stuffed";}

	echo "&nbsp &nbsp &nbsp <h4 display=inline font-size=40px; align-self='center'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &#9830; Crust: ".$cruststring."</h4>";

	
	echo "<script>";
	echo "sessionStorage.setItem('crust','".$_POST["crust"]."')";
	echo "</script>";

	echo "<br>";
	echo "&nbsp &nbsp &nbsp <h4 display=inline font-size=40px; align-self='center'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &#9830; Size: ".$_POST["size"]."</h4>";

	echo "<br>";
	$size = $_POST["size"];

	echo "<script>";
	echo "sessionStorage.setItem('size','".$size."')";
	echo "</script>";
	//echo "<br>";
	
	$quantity=$_POST["quantity"];

	echo "&nbsp &nbsp &nbsp <h4 display=inline font-size=40px; align-self='center'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &#9830; Quantity: ".$quantity."</h4>";

	echo "<br>";
	echo "<script>";
	echo "sessionStorage.setItem('quantity','".$quantity."')";
	echo "</script>";
	
	//echo "<br>";
	
	$count=0;
	$toppings="";
	foreach ($_POST["topping"] as $topping) {
		//$count=$count+1;
		
		$toppings=$toppings.",".$topping;
		
		
		//echo "<script>";
	//echo "sessionStorage.setItem('count',".$count.")";
	//echo "</script>";
				
	}
	//echo "<br>";

	$toppings=substr($toppings, 1);

	//echo $toppings;
	//echo "<br>";
	echo "<script>";
	echo "sessionStorage.setItem('toppings','".$toppings."')";
	echo "</script>";
	echo "&nbsp &nbsp &nbsp <h4 display=inline font-size=40px; align-self='center'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &#9830; Toppings: ".$toppings."</h4>";

	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	//echo "Final Price:";
	//echo "<p id='price'>".$price."</p>";
	echo "<script>";
	echo "sessionStorage.setItem('price',".$price.")";
	echo "</script>";
	echo "<hr>";
	$_SESSION['price'] = $price;
	echo "<h4 display=inline font-size=40px; align-self='right'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp Total: $ ".$price."</h4>";


	echo "</div>";
	

	//echo "<input type="button" value="Add to Cart" onclick="location='/OnlinePizzaDelivery-2019/checkout.php'" />";
	
?>

<html>
<head>
<script type="text/javascript" src="js/addtocart.js"></script>
</head>
<body>
		<br><br>
		<button class="btn btn-success" onclick= "location.href='/submit.php';">Go Back</button>
		<input type="submit" class="btn btn-success" id="cart" value="Add to Cart">
		
		<br><br>
		<br><br>
</body>
</html>