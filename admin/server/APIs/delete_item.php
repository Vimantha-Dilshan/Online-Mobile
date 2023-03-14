<?php
    // Establish the Connection
    include '../config/database_config.php';

    error_reporting(0);

    $id = $_GET['rn'];


    $query = "DELETE FROM stock_items WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        echo '<script type="text/javascript"> alert("Product deleted from database!") </script>';
        echo '<script type="text/javascript"> location.href = "../../stock_management.php" </script>';
    } else {
        echo '<script type="text/javascript"> alert("Failed to delete product from database") </script>';
        echo '<script type="text/javascript"> location.href = "../../stock_management.php" </script>';
    }
?>