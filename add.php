<?php
include ('./dbconnect.php');

$name = $_POST['name'];
$type = $_POST['type'];
$des= $_POST['detail'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$image = $_FILES['image'];

$imagefilename = $image['name'];
$imagefiletemp = $image['tmp_name'];
$image_error = $image['error'];
$filename_separate = explode('.',$imagefilename);
$imagefile_extension = strtolower($filename_separate[1]);   


$extension = array('jpeg','jpg','png');

if(in_array($imagefile_extension,$extension)){
    $upload_image = 'images/'.$imagefilename;
    move_uploaded_file($imagefiletemp,$upload_image);
    try{
    $sql = "INSERT INTO products(product_name, product_price, product_quantity, product_detail, product_category, product_image) 
            VALUES ('$name', '$price', '$quantity', '$des', '$type', '$upload_image')";
    $result = mysqli_query($conn,$sql);
    $error = "select product_name from products where product_name=$name";

    
    if($result){
        echo '<script>alert("Product added successfully")</script>'; 
    }
       
    }
    catch (exception $e) {
        // duplicate entry exception
        echo '<script>alert("Duplicate entry not allowed")</script>'; 
    }
}
    



?>