<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $firstName = $_POST['txtFirstName'];
    $lastName = $_POST['txtLastName'];
    $email = $_POST['txtEmail'];
    $mobile = $_POST['txtMobile'];
    $promoValue = $_POST['txtPromoValue'];
    $lastPurchase = $_POST['txtLastPurchase'];
    $date = $_POST['txtDate'];
    $added_by = $_POST['txtAddedBy'];
    $category = "Silver";

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO promo_users (first_name, last_name, email, mobile, promo_value, last_purchase, date, added_by, category) VALUES(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $firstName, $lastName, $email, $mobile, $promoValue, $lastPurchase, $date, $added_by, $category);
        $stmt->execute();

        // Yes
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Silver user added to database!');
        window.location.href='../../promo_users_silver.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>