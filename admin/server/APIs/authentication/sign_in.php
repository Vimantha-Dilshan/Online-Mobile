<?php 
    // Establish the Connection
    include '../../config/database_config.php';

    session_start();

    error_reporting(0);

    // Check user already sign on or not
    if (isset($_SESSION['username'])) {
        header("Location: ../../../stock_management.php");
    }

    if (isset($_POST['submit'])) {

        // Get Form data
        $email = $_POST['txtEmail'];
        $password = $_POST['txtPassword'];

        // Run SQL
        $sql = "SELECT * FROM admin_authentication WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        // Validation
        if ($result->num_rows > 0) {
            // Yes
            $row = mysqli_fetch_assoc($result);
            $_SESSION["user"]=$email;
            header("Location: ../../../stock_management.php");
            
        } else {
            // No
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Please Enter the valid authentication!');
            window.location.href='../../../sign_in.php';
            </script>");
        }
    }

?>