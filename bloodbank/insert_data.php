<!DOCTYPE html>
<html>
<head>
    <title>Insert Data - Blood Bank</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        
        .insert-form {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .insert-form label {
            display: block;
            margin-bottom: 10px;
        }

        .insert-form input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .insert-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Insert Data</h1>
    </header>
    <section>
        <div class="insert-form">
            <form action="insert_data.php" method="POST">
                <label for="donor_name">Donor Name:</label>
                <input type="text" id="donor_name" name="donor_name" required>

                <label>Select Blood Group:</label>
                <label><input type="radio" name="requested_blood_type" value="A+"> A+</label>
                <label><input type="radio" name="requested_blood_type" value="A-"> A-</label>
                <label><input type="radio" name="requested_blood_type" value="B+"> B+</label>
                <label><input type="radio" name="requested_blood_type" value="B-"> B-</label>
                <label><input type="radio" name="requested_blood_type" value="AB+"> A+</label>
                <label><input type="radio" name="requested_blood_type" value="AB-"> A-</label>
                <label><input type="radio" name="requested_blood_type" value="O+"> B+</label>
                <label><input type="radio" name="requested_blood_type" value="O-"> B-</label>
                <button type="submit">Check Availability</button>
                 <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" required>

                <button type="submit">Insert Record</button>
            </form>
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
    $name = $_POST["name"];
    $blood_group = $_POST["blood_group"];
    $contact = $_POST["contact"];

    $sql = "INSERT INTO donors (name, blood_group, contact) VALUES ('$name', '$blood_group', '$contact')";

    if ($result) {
        header('Location: admin_panel.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
