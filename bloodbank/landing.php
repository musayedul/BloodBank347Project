<!DOCTYPE html>
<html>
<head>
    <title>Blood Bank</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #dc3545;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h1 {
            margin: 0;
        }

        nav {
            background-color: #2c3e50;
            padding: 10px 0;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        li {
            display: inline-block;
            margin: 0 10px;
        }

        li a {
            color: #fff;
            text-decoration: none;
        }

        li a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
        }

        
        .logo-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .motivation-box {
            text-align: center;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .motivation-box h2 {
            margin-top: 0;
            color: #d9534f;
        }

        .motivation-box p {
            font-size: 20px;
            line-height: 1.5;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Our Blood Bank</h1>
    </header>
    <nav>
    <ul>
            <li><a href="become_donor.php">Become a Donor</a></li>
            <li><a href="need_blood.php">Need Blood</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="index.php">Logout</a></li>

        </ul>
    </nav>
    <section>
        
        <img src="images/img1.png" alt="Blood Bank Logo" class="logo-image">
        <div class="motivation-box">
            <h2>Donate Blood, Save Lives!</h2>
            <p>Your blood donation can make a significant impact on someone's life. Every drop counts.
                 Join us in this noble cause and help those in need.</p>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Blood Bank</p>
    </footer>
</body>
</html>


