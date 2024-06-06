<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table_name = $_POST['table_name'];
    $id_column = $_POST['id_column'];
    $id = $_POST['id'];

   
    $sql = "DELETE FROM $table_name WHERE $id_column = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: view_data.php?table_name=$table_name");
    exit;
}
?>
