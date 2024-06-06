<!DOCTYPE html>
<html>
<head>
    <title>Check Blood Availability - Blood Bank</title>
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
        <h1>Check Blood Availability</h1>
    </header>
    <section>
        <div class="availability-form">
        <form action="check_blood_availability.php" method="POST">
                <label>Select Blood Type:</label><br>
                <label><input type="radio" name="requested_blood_type" value="A+"> A+</label><br>
                <label><input type="radio" name="requested_blood_type" value="A-"> A-</label><br>
                <label><input type="radio" name="requested_blood_type" value="B+"> B+</label><br>
                <label><input type="radio" name="requested_blood_type" value="B-"> B-</label><br>
                <label><input type="radio" name="requested_blood_type" value="AB+"> AB+</label><br>
                <label><input type="radio" name="requested_blood_type" value="AB-"> AB-</label><br>
                <label><input type="radio" name="requested_blood_type" value="O+"> O+</label><br>
                <label><input type="radio" name="requested_blood_type" value="O-"> O-</label><br>
                

                <button type="submit">Check Availability</button>
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
    $requested_blood_type = $_POST['requested_blood_type'];

   
    $sql = "SELECT COUNT(*) AS count FROM donors WHERE blood_group = '$requested_blood_type'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $availability = $row['count'];

        $message = "Requested blood type $requested_blood_type is not available.";
        if ($availability > 0) {
            $message = "Requested blood type $requested_blood_type is available with $availability donors.";
        }

        echo "<p>$message</p>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

