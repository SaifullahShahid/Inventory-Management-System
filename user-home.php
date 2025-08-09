<?php
include ('./dbconnect.php');
session_start(); // Start the session

// Access $userid from the session
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;

$sql = "SELECT * FROM user where user_id = '$userid'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
}

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <script> 
        $(function(){
          $("#usersidebar").load("usersidebar.html"); 
        });
    </script> 
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #007bff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 15px;
        }

        section {
            padding: 20px;
            text-align: center;
        }

        /* .logo-container {
            background-image: url(tree.jpg); 
            background-size: cover;
            background-position: center;
            height: 400px;  Adjust the height as needed 
            display: flex;
            align-items: center;
            justify-content: center;
        } */

        .welcome-text {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            width: 300px;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div id="usersidebar"></div>
    <header>
        <h1> Welcome '.$name.'!</h1>
    </header>


    <section class="card-container">
        <div class="card">
            <img src="blueshoes.jpg" alt="Product 1">
            <h3>Shoes</h3>
            <p>Step into style and comfort with our latest collection of trendy and high-quality shoes. Elevate your every step with our fashionable footwear designed to make you stand out in every stride. </p>
            <button onclick="shoes()">View Shoes</button>
        </div>

        <div class="card">
            <img src="shirt.jpg" alt="Product 2">
            <h3>Shirts</h3>
            <p>Upgrade your style and make a statement with our premium collection of trendy and comfortable T-shirts. </p>
            <button onclick="shirt()">View Shirt</button>
        </div>

        <div class="card">
            <img src="bluepants.jpg" alt="Product 3">
            <h3>Pants</h3>
            <p>"Upgrade your wardrobe with our latest collection of trendy and comfortable pants – the perfect blend of style and comfort for every occasion!</p>
            <button onclick="pant()">View Pants</button>
        </div>
    </section>

    <footer>
        <p>&copy; 2023 Inventory Store. All rights reserved.</p>
    </footer>
</body>
<script>
        function shirt(){
            window.location.replace("usershirt.php");
        }
        function pant(){
            window.location.replace("userpants.php");
        }
        function shoes(){
            window.location.replace("usershoes.php");
        }
</script>
</html>';
?>
