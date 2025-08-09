<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="shirt.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script defer src="script.js"></script>
    <script> 
        $(function(){
          $("#usersidebar").load("usersidebar.html"); 
        });
        </script> 
        <style>
            .wishlist{
  background-color: darkgreen;
  border-radius: 20px;
  border: 2px solid #333;
  color: rgb(255, 255, 255);
  padding: 4px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}
.cart{
  background-color: darkgreen;
    border-radius: 20px;
    border: 2px solid #333;
    color: rgb(255, 255, 255);
    padding: 4px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
        </style>
        
</head>
<body>
    <div id="usersidebar"></div>
    <div class="products">
        <div class="container">
            
            <?php
        include ('./dbconnect.php');
        $sql = "SELECT * FROM products WHERE product_category='shirt'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $record_id = $row['product_id'];
            $name = $row['product_name'];
            $des = $row['product_detail'];
            $image = $row['product_image'];

        echo '
        <form action="select-quantity.php" method="post" enctype="multipart/form-data">
        <div class="card" >
        <img src="' . $image . '" alt="Product Image">
        <h2>' . $name . '</h2>
        <p>' . $des . '</p><br>
        
        <input type="hidden" name="product_id" value= "'.$record_id.'">
        <button type="submit" class="cart">Add to cart</button>
        </form>
        
        <form action="wishlist.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value= "'.$record_id.'">
        <button type="submit" class="wishlist">Add to Wishlist</button>
        
        </div>
        </form>';
        }   
        
?>    
        </div>
    </div>
   
</body>
</html>