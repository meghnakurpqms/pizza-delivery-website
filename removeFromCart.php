<?php
if(isset ($_POST['delete']))
{   
    //echo "yes";

                    session_start();
                    $con=mysqli_connect('localhost:8889','root','root','project');
                    
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();

                    }
                    
                    $username = $_SESSION["customer_id"]; 
    
    $checkbox = $_POST['checkbox'];


    foreach ($checkbox as $pizza)
    { 

        $sql = "DELETE FROM customer_order WHERE Pizza = '".$pizza."' AND customer_id = '".$username."'";
        
        
        mysqli_query($con,$sql);


        } 
header('Location: /checkout.php');
}

if(isset ($_POST['update']))
{   
    //echo "pizza";

                    session_start();
                    $con=mysqli_connect('localhost','root','root','project',8889);
                    
                    if (mysqli_connect_errno())
                    {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();

                    }
                    
                    $username = $_SESSION["customer_id"]; 
                    echo "<script>";
                    echo 'sessionStorage.removeItem("pizza")';
                    echo "<script>";

    $checkbox = $_POST['checkbox'];


    foreach ($checkbox as $pizza)
    { 
                    

        $sql = "DELETE FROM customer_order WHERE Pizza = '".$pizza."' AND customer_id = '".$username."'";
        
        
        mysqli_query($con,$sql);

        echo "<script>";
        echo "sessionStorage.setItem('pizza',". "'".$pizza."'". ")";
        echo "<script>";


} 

        

header('Location: /submit.php');
}
?>