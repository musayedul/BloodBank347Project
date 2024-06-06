<?php
function check_session() {
    // Initialize the session
    session_start();
    
    // Check if user is logged in
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: loginuser.php");
        exit;
    }
}
?>
