<!DOCTYPE html>
<html>
<head>
<title>PIZZA LOCO</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/admin.css" rel="stylesheet" type="text/css" media="all" />


<script type="text/javascript" src="js/order.js"></script>
<script type="text/javascript" src="js/loggedIn.js"></script>
<body>
<script type="text/javascript">
			$(document).ready(function() {
				var username = localStorage.getItem('username');

				if(username!= null)
				{
					document.getElementById("user").innerHTML += username+"!";
				}
							 
				
				 var pdata = document.getElementsByTagName("p");
				 if (username=="admin")
				 {
				 	document.getElementsByClassName("admin-list")[0].style.display = "block";
				 }
				 else
				 {
				 	document.getElementsByClassName("admin-list")[0].style.display = "none";
				 }
				
	});


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
<script src="js/simpleCart.min.js"> </script>	
</head>
	
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
							<h3> Checkout<img src="images/bag1.png" alt=""></h3></a>
							<div class="logout" id="logout-link">
								Logout
							</div>
							<div class="clearfix"> </div>
							<input type="text" id="myInput" placeholder="Search for pizzas.." title="Type in a name">
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
						<li class="active"><a href="pizza.php">Pizza</a></li>|
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
	<div class="content">
		<div class="container">
		<h2 id="user">Welcome </h2>
		<div class="admin-list">
			<a href="addItem.html"><button>Add Item</button></a>
			<a href="deleteItem.php"><button>Delete Item</button></a>
			<a href="updateItem.php"><button>Update Item</button></a>
		</div>
			<div class="tab">
				  <button class="tablinks active" onclick="updateItem(event, 'updatePizza')" id="all">All Pizzas</button>
				  <button class="tablinks" onclick="updateItem(event, 'updateVegPizza')" id="veg">Vegetarian</button>
				  <button class="tablinks" onclick="updateItem(event, 'updateNonvegPizza')" id="nonveg">Non Vegetarian</button>
				  
			</div>

	<div id="updatePizza" class="tabcontent" style="display:block;">
	<?php
	session_start();
	$con=mysqli_connect('localhost','root','root','project',8889);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$recordsPerPage = 3;
	$fromRecordNum = ($recordsPerPage * $page) - $recordsPerPage;

	$query1 = "SELECT item_name FROM items where isdeleted='0' LIMIT 
            {$fromRecordNum}, {$recordsPerPage} ";
	$query2 = "SELECT item_imagename FROM items where isdeleted='0' LIMIT 
            {$fromRecordNum}, {$recordsPerPage}";
	$result1 = mysqli_query($con,$query1);
	$result2 = mysqli_query($con,$query2);
	$query3="SELECT COUNT(item_name) as counts from items where isdeleted='0'";
	$result3= mysqli_query($con,$query3);
	$rows=mysqli_fetch_array($result3);
	$counts=$rows['counts'];

	$array1 = array();
	$array2 = array();
	$inc = 1;
	$num_rows = mysql_num_rows($result1);
	if($counts>0)
	{
	echo '<table>';

	while(($row1 = mysqli_fetch_array ($result1)) && ($row2 = mysqli_fetch_array ($result2))){
		echo '<tr>';
		echo '<td><p class="result" id="result'.$inc.'">'.$row1["item_name"].'</p></td>';
		echo '<td><img src="images/pizzas/'. $row2["item_imagename"]. '" alt="'. $row2["item_imagename"]. '" style="width:10em;height:10em;"></td>';
		echo '<td><input type="button" value="Order Now" class="order" id="order'.$inc.'"></td>';
		echo '</tr>';
		$inc++;
	}
	echo '</table>';
}//if counts>0

//pagination
// ***** for 'first' and 'previous' pages
// ***** for 'first' and 'previous' pages
if($page>1){
    // ********** show the first page
    echo "<a href='" . $_SERVER['PHP_SELF'] . "' title='Go to the first page.' class='customBtn'>";
        echo "<span style='margin:0 .5em;'> << </span>";
    echo "</a>";
     
    // ********** show the previous page
    $prev_page = $page - 1;
    echo "<a href='" . $_SERVER['PHP_SELF'] 
            . "?page={$prev_page}' title='Previous page is {$prev_page}.' class='customBtn'>";
        echo "<span style='margin:0 .5em;'> < </span>";
    echo "</a>";
     
}//page>1
$total_pages = ceil($counts / $recordsPerPage);
 
// range of num links to show
$range = 2;
$initial_num = $page - $range;
$condition_limit_num = ($page + $range)  + 1;
 
for ($x=$initial_num; $x<$condition_limit_num; $x++) {
     
    // be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
    if (($x > 0) && ($x <= $total_pages)) {
     
        // current page
        if ($x == $page) {
            echo "<span class='btn btn-primary' style='background:red;'>$x</span>";
        } 
         
        // not current page
        else {
            echo " <a href='{$_SERVER['PHP_SELF']}?page=$x' class='btn btn-primary'>$x</a> ";
        }
    }//if
}//for

if($page<$total_pages){
    // ********** show the next page
    $next_page = $page + 1;
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={$next_page}' title='Next page is {$next_page}.' class='customBtn'>";
        echo "<span style='margin:0 .5em;'> > </span>";
    echo "</a>";
     
    // ********** show the last page
    echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={$total_pages}' title='Last page is {$total_pages}.' class='customBtn'>";
        echo "<span style='margin:0 .5em;'> >> </span>";
    echo "</a>";
}//if

echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='GET'>";
    echo "Go to page: ";
    echo "<input type='text' name='page' size='2' />";
    echo "<input type='submit' value='Go' class='btn btn-danger' />";
echo "</form>"; 


	$query3="SELECT COUNT(item_name) from items where isdeleted='0'";
	$result3= mysqli_query($con,$query3);
	$row = mysql_fetch_row($result3);  
	$total_records = $row[0]; 
	alert($total_records); 
	$total_pages = ceil($total_records / $limit);  
	$pagLink = "<div class='pagination'>";  
	for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<a href='pizza.php?page=".$i."'>".$i."</a>";  
	};  
	echo $pagLink . "</div>";  
	$arrayp = json_encode($array);
	echo $array;
	mysqli_close();
	
	?>
	</div>
	<div id="updateVegPizza" class="tabcontent">
	<?php
	$con=mysqli_connect('localhost','root','root','project',8889);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	

	$query1 = "SELECT item_name FROM items WHERE item_type='Vegetarian' and isdeleted='0'";
	$query2 = "SELECT item_imagename FROM items WHERE item_type='Vegetarian' and isdeleted='0'";
	$result1 = mysqli_query($con,$query1);
	$result2 = mysqli_query($con,$query2);
	$array1 = array();
	$array2 = array();
	$inc = 1;
	echo '<table>';
	while(($row1 = mysqli_fetch_array ($result1)) && ($row2 = mysqli_fetch_array ($result2))){
		echo '<tr>';
		echo '<td><p class="result" id="result'.$inc++.'">'.$row1["item_name"].'</p></td>';
		echo '<td><img src="images/pizzas/'. $row2["item_imagename"]. '" alt="'. $row2["item_imagename"]. '" style="width:10em;height:10em;"></td>';
		echo '<td><input type="button" value="Order Now" id="order'.$inc++.'"></td>';
		echo '</tr>';	
	}
	echo '</table>';
	$arrayp = json_encode($array);
	echo $array;
	mysqli_close();
	?>
	
	</div>
	<div id="updateNonvegPizza" class="tabcontent">
	<?php
	$con=mysqli_connect('localhost','root','root','project',8889);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
	

	$query1 = "SELECT item_name FROM items WHERE item_type='Non Vegetarian' and isdeleted='0'";
	$query2 = "SELECT item_imagename FROM items WHERE item_type='Non Vegetarian' and isdeleted='0'";
	$result1 = mysqli_query($con,$query1);
	$result2 = mysqli_query($con,$query2);
	$array1 = array();
	$array2 = array();
	$inc = 1;
	echo '<table>';
	while(($row1 = mysqli_fetch_array ($result1)) && ($row2 = mysqli_fetch_array ($result2))){
		echo '<tr>';
		echo '<td><p class="result" id="result'.$inc++.'">'.$row1["item_name"].'</p></td>';
		echo '<td><img src="images/pizzas/'. $row2["item_imagename"]. '" alt="'. $row2["item_imagename"]. '" style="width:10em;height:10em;"></td>';
		echo '<td><input type="button" value="Order Now" id="order'.$inc++.'"></td>';
		echo '</tr>';	
	}
	echo '</table>';
	
	//$arrayp = json_encode($array);
	//echo $array;
	mysqli_close();
	?>
	</div>
		</div>
		</div>
	<!-- content-section-ends -->
	
	

</body>
</html>