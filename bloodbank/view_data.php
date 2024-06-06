<!DOCTYPE html>
<html>
<head>
    <title>View Data - Blood Bank</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden; 
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
            flex-shrink: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            flex-grow: 1;
        }

        .logout-button {
            background-color: #fff;
            color: #007bff;
            border: 2px solid #007bff;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .logout-button:hover {
            background-color: #007bff;
            color: #fff;
        }

        .data-table {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
            padding: 20px;
            overflow: hidden;
            box-sizing: border-box;
        }

        .data-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .data-table th {
            background-color: #007bff;
            color: #fff;
        }

        .table-selector {
            margin-top: 20px;
        }

        .table-container {
            width: 100%;
            height: 60vh; 
            overflow-y: auto;
            margin-top: 20px;
        }

        footer {
            background-color: red;
            color: #fff;
            text-align: center;
            padding: 10px;
            flex-shrink: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>View Data</h1>
        <a class="logout-button" href="index.php">Logout</a>
    </header>
    <section class="data-table">
        <h2>View Individual Tables</h2>
        <form action="view_data.php" method="GET" class="table-selector">
            <label for="table_name">Select a table:</label>
            <select id="table_name" name="table_name">
                <option value="donors">Donor Information</option>
                <option value="blood_requests">Request Information</option>
                <option value="contact_messages">View Messages</option>
                <option value="users">Users</option>
            </select>
            <button type="submit">View Table</button>
        </form>
        <?php
        include("db.php");

        if (isset($_GET['table_name'])) {
            $table_name = $_GET['table_name'];
            $id_column = ($table_name == 'users') ? 'user_id' : 'id';

            echo '<h3>' . ucwords(str_replace('_', ' ', $table_name)) . '</h3>';
            echo '<div class="table-container">';
            echo '<table>';
            echo '<thead>';
            echo '<tr>';

            $columns_sql = "SHOW COLUMNS FROM $table_name";
            $columns_result = mysqli_query($conn, $columns_sql);

            while ($column_row = mysqli_fetch_assoc($columns_result)) {
                echo '<th>' . $column_row['Field'] . '</th>';
            }

            echo '<th>Action</th>'; 
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $data_sql = "SELECT * FROM $table_name";
            $data_result = mysqli_query($conn, $data_sql);

            while ($data_row = mysqli_fetch_assoc($data_result)) {
                echo '<tr>';

                foreach ($data_row as $column_value) {
                    echo '<td>' . $column_value . '</td>';
                }

                echo '<td><form action="delete_row.php" method="POST">
                        <input type="hidden" name="table_name" value="' . $table_name . '">
                        <input type="hidden" name="id_column" value="' . $id_column . '">
                        <input type="hidden" name="id" value="' . $data_row[$id_column] . '">
                        <button type="submit" onclick="return confirm(\'Are you sure you want to delete this row?\')">Delete</button>
                      </form></td>';

                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>'; 
        }
        ?>
    </section>
    <footer>
        <p>&copy; 2024 Blood Bank</p>
    </footer>
</body>
</html>
