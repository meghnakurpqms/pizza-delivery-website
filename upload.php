<?php

	/* Getting file name */
	$filename = $_FILES['file']['name'];

	/* Location */
	$location = "images/pizzas/".$filename;
	
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

	
	 /* Upload file */
		 if(move_uploaded_file($_FILES['file']['tmp_name'],$location))
		 {
		 	echo "1";
		 }
		 else
		 {
		 	echo "not added";
		 }
	
?>