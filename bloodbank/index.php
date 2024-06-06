<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: hidden;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 100vh;
            max-width: 100vw;
            padding: 20px;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            flex: 1;
        }

        header {
            top: 0;
            background-color: #dc3545;
            color: #fff;
            padding: 10px;
            width: 100%;
            text-align: center;
        }

        section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            flex: 1;
            text-align: center;
        }

        a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        .logo-image {
            max-width: 80%;
            height: auto;
            margin: 20px 0;
        }

        .motivation-box {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            width: 100%;
        }

        footer {
            color: red;
            text-align: center;
            padding: 5px;
            width: 10%;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Our Blood Bank</h1>
        </header>
        <section class="content">
            <h2>Welcome to Blood Bank</h2>
            <div>
                <a href="loginuser.php">User Login</a>
                <a href="signup.php">User Signup</a>
                <a href="login.php">Admin Login</a>
            </div>
            <img src="images/img1.png" alt="Blood Bank Logo" class="logo-image">
            <div class="motivation-box">
                <h2>Donate Blood, Save Lives!</h2>
                <p>Your blood donation can make a significant impact on someone's life. Every drop counts. Join us in this noble cause and help those in need.</p>
            </div>
        </section>
        <footer>
            <p>&copy; 2024 Blood Bank</p>
        </footer>
    </div>
</body>
</html>
