<?php
include ('./dbconnect.php');

if (empty($_POST["name"])) {
    die("Name is required");
}
if (strlen($_POST["password"]) < 5) {
    die("Password must be at least 5 characters");
} 
if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}
if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone_no = $_POST['phone'];
$password = $_POST['password'];

try {
    $sql = "INSERT INTO user (name, email, phone_no, password) 
            VALUES ('$name', '$email', '$phone_no', '$password')";
    
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: login.php");
        // echo '<script>alert("Account Created Successfully")</script>'; 
        exit;
    }
} catch (Exception $e) {
    
    if ($e->getCode() == 1062) {
        die("Email already taken");
    } else {
        die("Error: " . $e->getMessage());
    }
}
?>
