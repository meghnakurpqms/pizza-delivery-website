
<!DOCTYPE html>
<html>
<body>
<?php include "header.php"; ?>
		<script type="text/javascript">
			$(document).ready(function() {
			 
			  var pizza = sessionStorage.getItem("pizza");
			  //document.getElementById("result").innerHTML = pizza;
			  var username = localStorage.getItem('username');
			  document.getElementById("user").innerHTML = username;		
			  document.getElementById("pizza").value = pizza;
			  document.getElementById("username").value = username;
			});
		</script>
    
	
	<h2 id="user"></h2>
	<?php
	
		session_start();
		$pizzaname = $_SESSION['pizza'];
		$con=mysqli_connect('localhost','root','root','project',8889);
	
    if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();

	}
		$query2 = "SELECT item_imagename FROM items WHERE item_name='".$pizzaname."'";
		$result2 = mysqli_query($con,$query2);
		$row2 = mysqli_fetch_array ($result2);
		echo '<p name="result" id="result">'.$pizzaname.'</p>';	
		echo '<img src="images/pizzas/'. $row2["item_imagename"]. '" alt="'. $row2["item_imagename"]. '" style="width:10em;height:10em;"></td>';
		echo '<input type="hidden" name="pizza" id="pizza"/>';
		echo '<input type="hidden" name="username" id="username"/>';
	?>
	<form action="order.php" method="post">
		<div class="container">
		<div class="row">			

			<div class="col-md-6" class="submit-order">
 
			<!-- <input type="checkbox" name="topping[]" value="chicken">CHICKEN
			<input type="checkbox" name="topping[]" value="pepperoni">PEPPERONI 
			<input type="checkbox" name="topping[]" value="salami">SALAMI
			<input type="checkbox" name="topping[]" value="bacon">BACON
			<input type="checkbox" name="topping[]" value="beef">BEEF
			<input type="checkbox" name="topping[]" value="ham">HAM
			<input type="checkbox" name="topping[]" value="cheddar">CHEDDAR
			<input type="checkbox" name="topping[]" value="parmesan">PARMESAN
			<input type="checkbox" name="topping[]" value="green olives">GREEN OLIVES
			<input type="checkbox" name="topping[]" value="jalapenos peppers">JALAPENOS PEPPERS
			<input type="checkbox" name="topping[]" value="diced tomatoes">DICED TOMATOES
			<input type="checkbox" name="topping[]" value="feta cheese">FETA CHEESE
			<input type="checkbox" name="topping[]" value="black olives">BLACK OLIVES
			<input type="checkbox" name="topping[]" value="mushrooms">MUSHROOMS
			<input type="checkbox" name="topping[]" value="onions">ONIONS
			<input type="checkbox" name="topping[]" value="spinach">SPINACH
		</div> -->
		 
<?php
		 if (mysqli_connect_errno())
    	{
          echo "Failed to connect to MySQL: " . mysqli_connect_error();

    	}


	$sql = "SELECT * FROM toppings ";
	$inc = 0;
	$count=0;
	$res=mysqli_query($con,$sql);
		$rows=mysqli_fetch_array ($res);     
				
				 echo "<p id='tops1'>Toppings</p>";
				

				if(mysqli_num_rows($res) > 0)
				{
					echo "<table width=105%>";

					echo "<tr>";
				while($rows = mysqli_fetch_array ($res)){
					
					//echo $rows['name'];add
					echo  '<td><p style="display:inline" id="tops"><input type="checkbox" name="topping[]" value="'.$rows["name"].'">'.$rows["name"]."</p></td>";
					$count=$count+1;
					if($count>3)
					{
						$count=0;
						echo "</tr>";
					echo "</br>";
				}
						
				}
				echo "</td></tr></table>";
				}  
				
		 
						    
				else 
					{ 
						echo "No matching records are found."; 
					} 
						

			
						

			
			/*			 
			{ 
				 echo "ERROR: Could not able to execute $sql. ".mysqli_error($con); 
			}  */


		echo '</div>';
			?>
			<div class="col-md-2" class="submit-order" >	
				<p id='tops1'>Crust</p>
				<br></br>
				<select name="crust">	
				  <option value="1">Thin crust</option>
				  <option value="2">Pan</option>
				  <option value="3">Stuffed</option>
				</select>	
			</div>
			<div class="col-md-2" class="submit-order">
				<p id='tops1'>Size</p>
				<br></br>
				<select name="size">	
				  <option value="small">SMALL</option>
				  <option value="medium">MEDIUM</option>
				  <option value="large">LARGE</option>
				</select>		
			</div>
			<div class="col-md-2" class="submit-order">
				<p id='tops1'>Quantity</p>
				<br></br>
				<input type="number" name="quantity" min="1" max="10" value="1">	
			</div>
		</div>
		


		</div>	
			<br><br>
		
					<input type="submit" class="btn btn-success" value="Proceed to checkout">
					<br><br>
	</form> 
	
	<!-- <?php include "footer.php" ?> -->

</body>
</html>