<!DOCTYPE html>
<html>
<head>
    <title>Blood Bank - Contact Us</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header, nav, section, footer {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            background-color: #dc3545;
            color: #fff;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: #dc3545;
            font-weight: bold;
        }

        section h2 {
            color: #dc3545;
        }

        .contact-form, .contact-info {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .contact-form form {
            display: flex;
            flex-direction: column;
        }

        .contact-form label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .contact-form input, .contact-form textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        .contact-form button {
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        .contact-form button:hover {
            background-color: #c82333;
        }

        .contact-info {
            text-align: center;
        }

        .contact-info p, .contact-info a {
            margin: 5px 0;
        }

        .contact-info a.home-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .contact-info a.home-button:hover {
            background-color: #c82333;
        }

        footer {
            text-align: center;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>
    <section>
        <h2>Get in Touch:</h2>
        <div class="contact-form">
            <p>If you have any questions or concerns, please fill out the form below:</p>
            <form action="contact_us.php" method="POST">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="contact-info">
            <h2>Contact Information</h2>
            <p>Phone Number: 01771692001</p>
            <p>Email: bloodbank44a@gmail.com</p>
            <a href="landing.php" class="home-button">Home</a>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Blood Bank</p>
    </footer>
</body>
</html>
<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Your message has been sent. We will get back to you soon.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
