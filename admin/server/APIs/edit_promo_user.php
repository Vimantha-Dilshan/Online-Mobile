<?php
    // Establish the Connection
    include '../config/database_config.php';
    
    // Get form data
    $id = $_POST['txtID'];
    $firstName = $_POST['txtFirstName'];
    $lastName = $_POST['txtLastName'];
    $email = $_POST['txtEmail'];
    $mobile = $_POST['txtMobile'];
    $promoValue = $_POST['txtPromoValue'];
    $lastPurchase = $_POST['txtLastPurchase'];
    $date = $_POST['txtDate'];
    $added_by = $_POST['txtAddedBy'];
    $category = $_POST['txtCategory'];

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {

        $sql = "UPDATE `promo_users` SET `first_name` = '$firstName', `last_name` = '$lastName', `email` = '$email', `mobile` = '$mobile', `promo_value` = '$promoValue', `last_purchase` = '$lastPurchase', `date` = '$date', `added_by` = '$added_by', `category` = '$category' WHERE `promo_users`.`id` = $id; ";

        if ($conn->query($sql) === TRUE) {
            // Yes
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Promo user updated!');
            window.location.href='../../stock_management.php';
            </script>");
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
?>