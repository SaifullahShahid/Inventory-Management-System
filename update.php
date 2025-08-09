<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script> 
        $(function(){
          $("#sidebar").load("sidebar.html"); 
        });
        </script> 
   
</head>
<body>
    <div id="sidebar"></div>

    <div class="container">
        
        <div class="form-box">
            <form action="final-update.php" method="post" enctype="multipart/form-data">
            <h1>Update Product</h1>
            <div class="input-group">
                <div class="input-field">
                    <label for="name">Product Name</label><br>
                    <input type="text" id="name" name="name"><br>
                </div>
                
                
                </div> <div class="input-field">
                    <label for="detail">Product Description</label><br>
                    <input type="text" id="detail" name="detail" ><br>
                </div>
                <div class="input-field">
                    <label for="price">Price</label><br>
                    <input type="number" id="price" name="price" ><br>
                </div>
                <div class="input-field">
                    <label for="quantity">Quantity</label><br>
                    <input type="number" id="quantity" name="quantity" ><br><br>
                </div>
                <div class="input-field" >
                    <label for="image">Image</label><br>
                    <input type="file" id="image" name="image"><br>
                </div>
                <?php
 

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                // Retrieve form data
                                $product_id = $_POST['product_id'];

                                // Use $product_id as needed
                                
                                echo'<input type="hidden" name="product_id" value= "'.$product_id.'">';
                                
                            
                            }
                            ?>
                <div class="submit">
                    <div class="add">
                    <label for="Add"></label>
                    <input type="submit" name="Add" value="Update">
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>
 <?php
 

//  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Retrieve form data
//     $product_id = $_POST['product_id'];

//     // Use $product_id as needed
//     echo " ".$product_id;

    
   
// }
?> 