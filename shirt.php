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
          $("#sidebar").load("sidebar.html"); 
        });
        </script> 
        
</head>
<body>
    <div id="sidebar"></div>
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
        <head>
        <style>
        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
          }
          
          .card {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 10px;
            text-align: center;
          }
          
          .card img {
            max-width: 100%;
            height: auto;
          }
          
          h2 {
            margin-top: 10px;
            font-size: 1.5rem;
          }
          
          p {
            margin-bottom: 10px;
          }
          
          button {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
          }
          
          button:hover {
            background-color: #45a049;
          }
          
          /* Style for the update button */
          .update-button {
            background-color: #008CBA;
          }
          
          .update-button:hover {
            background-color: #007B9D;
          }
          
          /* Style for the delete button */
          .delete-button {
            background-color: #FF0000;
          }
          
          .delete-button:hover {
            background-color: #CC0000;
          }
        </style>
        </head>
        <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="card" >
        <img src="' . $image . '" alt="Product Image">
        <h2>' . $name . '</h2>
        <p>' . $des . '</p><br>
    
        <input type="hidden" name="product_id" value= "'.$record_id.'">
        <button type="submit" class="update-button">update</button>
        </form>
        
        <form action="delete.php" method="post" enctype="multipart/form-data">
       
  
     
        <input type="hidden" name="product_id" value= "'.$record_id.'">
        <button type="submit" class="delete-button">delete</button>
        
        </div>
        </form>';
        }   
        
?>    
        </div>
    </div>
   
</body>
</html>