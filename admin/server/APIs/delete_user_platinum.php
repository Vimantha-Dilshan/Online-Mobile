<?php
    // Establish the Connection
    include '../config/database_config.php';

    error_reporting(0);

    $id = $_GET['rn'];


    $query = "DELETE FROM promo_users WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo '<script type="text/javascript"> alert("Platinum user deleted from database!") </script>';
        echo '<script type="text/javascript"> location.href = "../../promo_users_platinum.php" </script>';
    } else {
        echo '<script type="text/javascript"> alert("Failed to delete platinum user from database") </script>';
        echo '<script type="text/javascript"> location.href = "../../promo_users_platinum.php" </script>';
    }
?>