<?php
include ('./dbconnect.php');

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $product_id = $_POST['product_id'];

    // Use $product_id as needed

    try{
    $sql = "Delete from products where product_id = '$product_id' ";
    $result = mysqli_query($conn,$sql);

    
    if($result){
        echo '<script>alert("Product delete successfully")</script>'; 
    }
       
    }
    catch (exception $e) {
        // duplicate entry exception
        echo '<script>alert("Duplicate entry not allowed")</script>'; 
    }
}
    



?>