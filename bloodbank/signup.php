<?php
session_start();
require_once 'db.php';

$name = $email = $mobile_number = $age = $password = "";
$name_err = $email_err = $mobile_number_err = $age_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }
    if (empty(trim($_POST["mobile_number"]))) {
        $mobile_number_err = "Please enter your mobile number.";
    } else {
        $mobile_number = trim($_POST["mobile_number"]);
    }
    if (empty(trim($_POST["age"]))) {
        $age_err = "Please enter your age.";
    } else {
        $age = trim($_POST["age"]);
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    if (empty($name_err) && empty($email_err) && empty($mobile_number_err) && empty($age_err) && empty($password_err)) {
        $sql = "INSERT INTO users (name, email, mobile_number, age, password) VALUES (?, ?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssis", $param_name, $param_email, $param_mobile_number, $param_age, $param_password);
            $param_name = $name;
            $param_email = $email;
            $param_mobile_number = $mobile_number;
            $param_age = $age;
            $param_password = $password; 
            
            
            if ($stmt->execute()) {
                header("location: loginuser.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number">
            </div>
            <div class="form-group">
                <input type="text" name="age" class="form-control" placeholder="Age">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
            <p>Already have an account? <a href="loginuser.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>
