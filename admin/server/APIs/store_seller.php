<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $company = $_POST['txtCompany'];
    $address = $_POST['txtAddress'];
    $telephone01 = $_POST['txtTelephone01'];
    $telephone02 = $_POST['txtTelephone02'];
    $toPay = $_POST['txtToPay'];
    $paidAmount = $_POST['txtPaidAmount'];

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO seller_details (company, address, telephone_01, telephone_02, to_pay, paid_amount) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssssdd", $company, $address, $telephone01, $telephone02, $toPay, $paidAmount);
        $stmt->execute();

        // Yes
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Seller added to database!');
        window.location.href='../../stock_management.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>