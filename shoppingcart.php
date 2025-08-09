<?php
include ('./dbconnect.php');
session_start(); // Start the session

// Access $userid from the session

$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;
$quantity = $_POST['quantity'];
$product_id = $_POST['product_id'];
$sql = "SELECT * FROM products WHERE product_id='$product_id'";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $record_id = $row['product_id'];
    $name = $row['product_name'];
    $price =  $row['product_price'];
    $image = $row['product_image'];
    $type = $row['product_category'];
    $quantity2 = $row['product_quantity'];

}
if($quantity > $quantity2){
    echo '<script>alert("Please enter valid quantity")</script>';
}
else{

    try{

    $sql = "INSERT INTO shoppingcart(product_id,product_name, product_price,product_image,user_id,product_quantity) 
            VALUES ('$product_id','$name', '$price', '$image','$userid','$quantity')";
    $sql2 = "UPDATE products set product_quantity = product_quantity-$quantity where product_id='$product_id'";
    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql2);

  

    
    if($result){
        if($type=='Shirt'){
            header("Location:usershirt.php");
        }
        else if($type=='Pants'){
            header("Location:userpants.php");
        }
        else{
            header("Location:usershoes.php");
        }
    }
       
    }
    catch (exception $e) {
       
        if($type=='Shirt'){
            header("Location:usershirt.php");
        }
        else if($type=='Pants'){
            header("Location:userpants.php");
        }
        else{
            header("Location:usershoes.php");
        }
    }
  
}


?>