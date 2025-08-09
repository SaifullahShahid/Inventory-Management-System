<?php
echo '
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Sidebar Menu with sub-menu </title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <script> 
        $(function(){
          $("#sidebar").load("sidebar.html"); 
        });
      </script> 
      <style>
         h1{
            display: flex;
            justify-content: center;
            align-items: center;
         }
         table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
         }
         th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
         }
         th {
            background-color: #f2f2f2;
         }
      </style>
   </head>
   <body>
      <div id="sidebar"></div>
      <h1>Sales</h1>
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">#</th>
               <th scope="col">Product Name</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity Sold</th>
               <th scope="col">User Email</th>
               <th scope="col">Date</th>
            </tr>
         </thead>
         <tbody>';

include ('./dbconnect.php');
$sql = "SELECT * FROM checkout";
$result = mysqli_query($conn, $sql);
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $record_id = $row['product_id'];
    $name = $row['product_name'];
    $quantity_sold = $row['quantity_sold'];
    $user_id = $row['user_id'];
    $product_price = $row['product_price'];
    $sold_date = $row['bought_date'];
    $email;
    
    $sql2 = "SELECT * FROM user WHERE user_id= '$user_id'";
    $result2 = mysqli_query($conn, $sql2);
    
    while ($row1 = mysqli_fetch_assoc($result2)) {
        $email = $row1['email'];
    }
    $i = $i +1;
    echo '
            <tr>
               <th scope="row">' . $i . '</th>
               <td>' . $name . '</td>
               <td>' . $product_price . '</td>
               <td>' . $quantity_sold . '</td>
               <td>' . $email . '</td>
               <td>' . $sold_date . '</td>

            </tr>
    ';
}

echo '
         </tbody>
      </table>
   </body>
</html>';
?>
