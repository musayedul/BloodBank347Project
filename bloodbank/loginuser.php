<?php
    include('db.php');
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from users where email = '$email' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: landing.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid email or password!!")
                    </script>';
        }     
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"],
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        p a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit" name="submit">Login</button>
        </div>
        </div>
      <p>Don't have an account? <a href="signup.php">Sign Up here</a>.</p>
    </form>
</body>
</html>
