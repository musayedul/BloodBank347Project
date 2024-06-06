<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Blood Bank</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header, nav, section, footer {
            margin: 20px;
            padding: 20px;
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

        .admin-panel {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-panel h2 {
            margin-bottom: 10px;
            color: #bb0000;
        }

        .admin-functions ul {
            list-style: none;
            padding: 0;
        }

        .admin-functions li {
            margin-bottom: 10px;
        }

        .admin-functions a {
            text-decoration: none;
            color: #bb0000;
            font-weight: bold;
        }

        .admin-functions a:hover {
            text-decoration: underline;
        }

        .logout-link {
            display: block;
            margin-top: 10px;
            text-align: right;
        }

        .logout-link a {
            color: #bb0000;
            font-weight: bold;
            text-decoration: none;
        }

        .logout-link a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            bottom: 0;
            background-color: #bb0000;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>
    <section>
        <?php
        session_start();
        include("db.php");

        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM admins WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $admin = mysqli_fetch_assoc($result);
            echo '<div class="admin-panel">';
            echo '<h2>Welcome, ' . $admin['username'] . '!</h2>';
            echo '<div class="admin-functions">';
            echo '<ul>';
            echo '<li><a href="view_data.php">View Data</a></li>';
            echo '<li><a href="check_blood_availability.php">Check Blood Availability</a></li>';
            echo '</ul>';
            echo '</div>';
            echo '<div class="logout-link"><a href="logout.php">Log Out</a></div>';
            echo '</div>';
        } else {
            echo '<p>Error fetching admin data.</p>';
        }
        ?>
    </section>
    <footer>
        <p>&copy; 2024 Blood Bank</p>
    </footer>
</body>
</html>
