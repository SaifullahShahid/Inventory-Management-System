<?php
include ('./dbconnect.php');
session_start(); // Start the session

// Access $userid from the session
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;
$sql = "SELECT * FROM shoppingcart where user_id = '$userid'";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $record_id = $row['product_id'];
    $name = $row['product_name'];
    $price =  $row['product_price'];
    $quantity = $row['product_quantity'];
    $image = $row['product_image'];

}

try{
   

    $sql = "INSERT INTO checkout(product_id,product_name, product_price,image,user_id,quantity_sold) 
            VALUES ('$record_id','$name', '$price', '$image','$userid','$quantity')";
    


    
    $result = mysqli_query($conn,$sql);
  

    
    if($result){
        $delete = "Delete from shoppingcart where product_id = '$record_id'";
        mysqli_query($conn,$delete);
        echo '<script>alert("Checked Out")</script>'; 
        header("user-shoppingcart.php");
    }
       
    }
    catch (exception $e) {
        // duplicate entry exception
        echo '<script>alert("Duplicate entry not allowed")</script>'; 
    }


?>