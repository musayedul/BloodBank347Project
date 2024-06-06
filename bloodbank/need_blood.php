<!DOCTYPE html>
<html>
<head>
    <title>Blood Bank - Need Blood</title>
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

        .blood-request-form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #e0ffe0;
            border: 1px solid #880000;
            border-radius: 5px;
        }

        .blood-request-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .blood-request-form input, .blood-request-form select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #880000;
            border-radius: 5px;
        }

        .blood-request-form button {
            background-color: #bb0000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        .blood-request-form button:hover {
            background-color: #880000;
        }

        .nav-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .nav-buttons button {
            background-color: #bb0000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 0 10px;
        }

        .nav-buttons button:hover {
            background-color: #880000;
        }

        .message {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffebeb;
            border: 1px solid #880000;
            border-radius: 5px;
            text-align: center;
        }

        .message p {
            color: #bb0000;
            font-weight: bold;
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
        <h1>Need Blood</h1>
    </header>

    <section>
        <h2>Request Blood:</h2>
        <div class="blood-request-form">
            <form action="need_blood.php" method="POST">
                <label for="patient_name">Patient's Name:</label>
                <input type="text" id="patient_name" name="patient_name" required><br><br>

                <label for="blood_group">Required Blood Group:</label>
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
        <div class="nav-buttons">
            <button onclick="location.href='landing.php'">Home</button>
        </div>
        <div class="message" id="requestMessage" style="display: none;">
            <p>Your request has been sent!</p>
            <a href="check_blood_availability.php" class="check-link">Check Blood Availability</a>
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
    $patient_name = $_POST["patient_name"];
    $blood_group = $_POST["blood_group"];
    $contact = $_POST["contact"];

    $sql = "INSERT INTO blood_requests (patient_name, blood_group, contact) VALUES ('$patient_name', '$blood_group', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                document.getElementById('requestMessage').style.display = 'block';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
