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

    echo'
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    
    <head>
        <meta charset="utf-8">
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script defer src="script.js"></script>
        <script>
        $(function(){
          $("#usersidebar").load("usersidebar.html"); 
        });
   </script>
        <style>
            .container {
                padding-top: 50px;
                padding-left:270px;
            }
    
            .card {
                margin-bottom: 20px;
            }
    
            .card img {
                height: 100%;
                width: 100%;
                object-fit: cover;
                border-radius: 8px;
            }
    
            .card-body {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
    
            .card-title {
                font-size: 1.5rem;
                margin-bottom: 10px;
            }
    
            .card-text {
                font-size: 1.25rem;
                margin-bottom: 10px;
            }
    
            form {
                display: flex;
                align-items: center;
            }
    
            button {
                background-color: #dc3545;
                color: white;
                border: none;
                padding: 8px 12px;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
    
            button:hover {
                background-color: #bd2130;
            }
            .submit {
               background-color: #ff0000; 
               color: #fff; 
               padding: 10px 15px;
               border: none;
               border-radius: 4px;
               cursor: pointer;
               position: absolute;
              top:20px;
              right:20px;
           }
           
           .submit:hover {
               background-color: #cc0000; 
               
           }
        </style>
    
    </head>
    
    <body>
    <div id="usersidebar"></div>
        <div class="container d-flex-column  justify-content-center align-items-center">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="'.$image.'" class="img-fluid rounded-start" alt="Product Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">'.$name.'</h5>
                            <p class="card-text">Price:'.$price.'  </p>
                            <form action="delete-cart.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="product_id" value="'.$record_id.'">
                                <input type="hidden" name="quantity" value="'.$quantity.'">
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="checkout.php" method="post">
  
        <button type="submit" class="submit">checkout</button>
        </form>
    </body>
    
    </html>
    
    ';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
          $(function(){
            $("#usersidebar").load("usersidebar.html"); 
          });
     </script>
     <style>
     .submit {
    background-color: #ff0000; 
    color: #fff; 
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    position: absolute;
   top:20px;
   right:20px;
}

.submit:hover {
    background-color: #cc0000; 
    
}
     </style>

</head>

<body>
<!-- <div id="usersidebar"></div> -->
  <!-- <form action="checkout.php" method="post">
  
  <button type="submit" class="submit">checkout</button>
  </form> -->
  
</body>
</html>
