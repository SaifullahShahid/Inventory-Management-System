<?php
include ('./dbconnect.php');

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $product_id = $_POST['product_id'];

    // Use $product_id as needed

    try{
    $sql = "Delete from wishlist where product_id = '$product_id' ";
    $sql2 = "UPDATE products set product_quantity = product_quantity+1 where product_id='$product_id'";
    $result2 = mysqli_query($conn,$sql2);
    $result = mysqli_query($conn,$sql);
    
    


    
    if($result){
        echo '<script>alert("Product removed from Wishlist")</script>'; 
    }
       
    }
    catch (exception $e) {
        // duplicate entry exception
        echo '<script>alert("Duplicate entry not allowed")</script>'; 
    }
}
    


