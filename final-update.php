<?php
include ('./dbconnect.php');

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $product_id = $_POST['product_id'];

    // Use $product_id as needed
    


$name = $_POST['name'];
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
    $sql = "Update products set product_name = '$name', product_price='$price', product_quantity='$quantity', product_detail='$des', product_image='$upload_image' where product_id = '$product_id' ";
    $result = mysqli_query($conn,$sql);
    $error = "select product_name from products where product_name=$name";

    
    if($result){
        echo '<script>alert("Product updated successfully")</script>'; 
    }
       
    }
    catch (exception $e) {
        // duplicate entry exception
        echo '<script>alert("Duplicate entry not allowed")</script>'; 
    }
}
    


}
?>