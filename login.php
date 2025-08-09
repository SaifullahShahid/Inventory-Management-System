<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include ('./dbconnect.php');
    
    // Use prepared statement to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "SELECT * FROM user WHERE email=?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    // Fetch the user data
    while ($row = mysqli_fetch_assoc($result)) {
        $fetchedPassword = $row['password'];
        $userid = $row['user_id'];
      
    }

    //forward data to shopping cart
    $_SESSION['userid'] = $userid;
    

    // Verify the password
    $enteredPassword = $_POST['password'];
    // echo $fetchedPassword;
    // echo $enteredPassword;

    //Log in for admin
    if($enteredPassword === 'admin123' && $email === 'admin@gmail.com' ){
        header("Location:index.php");
    }

    //login for user
    if ($enteredPassword === $fetchedPassword) {
        header("Location:user-home.php");
    } else {
        die("Invalid Passwordu");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .container {
            width: 400px; /* Adjust the width as needed */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            margin-top: 20px;
            width: 100%; /* Make the form full width within the container */
            text-align: center; /* Center the content within the form */
            padding-bottom: 10px;
        }

        form div {
            margin-bottom: 10px;
            width: 100%; /* Make the form elements full width */
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #submit {
            background-color: #008CBA;
        }

        #submit:hover {
            background-color: #007B9D;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit">Login</button>
        </form>
        <button id="submit" onclick="signup()">Sign Up</button>
    </div>

    <script>
        function signup() {
            window.location.href = "signup.html";
        }
    </script>
</body>
</html>

