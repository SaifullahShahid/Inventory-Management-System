<?php
include ('./dbconnect.php');
session_start(); // Start the session

// Access $userid from the session
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;

$product_id = $_POST['product_id'];
$sql = "SELECT * FROM products WHERE product_id='$product_id'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $record_id = $row['product_id'];
    $name = $row['product_name'];
    $price =  $row['product_price'];
    $image = $row['product_image'];
    $type = $row['product_category'];

}

try{

    $sql = "INSERT INTO wishlist(product_id,product_name, product_price,product_image,user_id,product_category) 
            VALUES ('$product_id','$name', '$price', '$image','$userid','$type')";
    
    $result = mysqli_query($conn,$sql);


    $error = "select product_name from products where product_name=$name";

    
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
  



?>
