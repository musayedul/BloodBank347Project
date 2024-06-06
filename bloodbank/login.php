<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Blood Bank</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        
        .login-form {
            max-width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .login-form label {
            display: block;
            margin-bottom: 10px;
        }

        .login-form input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .login-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Login</h1>
    </header>
    <section>
        <div class="login-form">
            <form action="login.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Log In</button>
            </form>
            <?php
            if (isset($_GET['error'])) {
                echo '<p class="error-message">Incorrect username or password. Please try again.</p>';
            }
            ?>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Blood Bank</p>
    </footer>
</body>
</html>

<?php
session_start();
include("db.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $admin = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $admin['id'];
        header('Location: admin_panel.php');
        exit();
    } else {
        header('Location: login.php?error=1');
        exit();
    }
}
?>