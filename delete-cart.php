<?php
include ('./dbconnect.php');

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    // Use $product_id as needed
    

    try{
    echo $product_id; 
    echo $quantity;   
          
    $sql = "Delete from shoppingcart where product_id = '$product_id' ";
    $sql2 = "UPDATE products set product_quantity = product_quantity+'$quantity' where product_id='$product_id'";
   
    $result = mysqli_query($conn,$sql);
    
    


    
    if($result){
        header("Location:user-shopping-cart.php");
    }
       
    }
    catch (exception $e) {
        // duplicate entry exception
        echo '<script>alert("Duplicate entry not allowed")</script>'; 
    }
}
    



?>