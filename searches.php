<!-- Meghs -->
<!DOCTYPE html>
<html>
<head>
<title>PIZZA LOCO</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="css/admin.css" rel="stylesheet" type="text/css" media="all" />


<script type="text/javascript" src="js/order.js"></script>
<script type="text/javascript" src="js/loggedIn.js"></script>
</head>
<body>
<script type="text/javascript">


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
							<form name="SearchForm" action="searches.php" method="post">
				<label for="searchbox">Search:</label>
				<input type="text" name="searchbox" id="searchbox" placeholder="Search for a pizza">
				<input type="submit" class="btn btn-success" id="Search" value="Search">
				</form>

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
    $searchTerm = $_POST["searchbox"];
      $searchTerm = trim($searchTerm);  
  
      $sql = "SELECT item_name,item_imagename FROM items where isdeleted=0 and Inventory>0 and item_name LIKE '%".$searchTerm."%'";
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


$sql = "SELECT item_name,item_imagename FROM items where item_type='Vegetarian' isdeleted=0 and Inventory>0 and item_name LIKE '%".$searchTerm."%'";
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


$sql = "SELECT item_name,item_imagename FROM items where item_type='Non Vegetarian' and isdeleted=0 and Inventory>0 and item_name LIKE '%".$searchTerm."%'";
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