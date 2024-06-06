<!DOCTYPE html>
<html>
<head>
    <title>Blood Bank - Become a Donor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            overflow: hidden; /* Prevent scrolling */
        }

        header, nav, section, footer {
            margin: 20px;
            padding: 20px;
            border: 1px solid #880000;
            background-color: #ffffff;
            border-radius: 5px;
        }

        header {
            background-color: #bb0000;
            color: white;
            text-align: center;
        }

        h1, h2 {
            margin: 0;
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

        .donor-form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffebeb;
            border: 1px solid #880000;
            border-radius: 5px;
        }

        .donor-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .donor-form input, .donor-form select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #880000;
            border-radius: 5px;
        }

        .donor-form button {
            background-color: #bb0000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        .donor-form button:hover {
            background-color: #880000;
        }

        .success-message {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffebeb;
            border: 1px solid #880000;
            border-radius: 5px;
            text-align: center;
        }

        .success-message p {
            color: #bb0000;
            font-weight: bold;
        }

        .success-button {
            background-color: #bb0000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        .success-button:hover {
            background-color: #880000;
        }

        footer {
            text-align: center;
            background-color: #bb0000;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Become a Donor</h1>
    </header>
    <section>
        <h2>Fill in your details to become a blood donor:</h2>
        <div class="donor-form">
            <form action="become_donor.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="blood_group">Blood Group:</label>
                <select id="blood_group" name="blood_group" required>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select><br><br>

                <label for="contact">Contact Number:</label>
                <input type="tel" id="contact" name="contact" required><br><br>

                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="success-message" id="successMessage" style="display: none;">
            <p>Blood donation successful. Congrats!</p>
            <button class="success-button" onclick="location.href='index.php'">Go to Home</button>
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
    $blood_group = $_POST["blood_group"];
    $contact = $_POST["contact"];

    $sql = "INSERT INTO donors (name, blood_group, contact) VALUES ('$name', '$blood_group', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                document.getElementById('successMessage').style.display = 'block';
                setTimeout(function() {
                    location.href = 'index.php';
                }, 5000);
              </script>";
        session_start();
        session_unset();
        session_destroy();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }  
}
?>
