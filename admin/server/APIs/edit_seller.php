<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $id = $_POST['txtID'];
    $company = $_POST['txtCompany'];
    $address = $_POST['txtAddress'];
    $telephone01 = $_POST['txtTelephone01'];
    $telephone02 = $_POST['txtTelephone02'];
    $toPay = $_POST['txtToPay'];
    $paidAmount = $_POST['txtPaidAmount'];

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {

        $sql = "UPDATE `seller_details` SET `company` = '$company', `address` = '$address', `telephone_01` = '$telephone01', `telephone_02` = '$telephone02', `to_pay` = '$toPay', `paid_amount` = '$paidAmount' WHERE `seller_details`.`id` = $id; ";

        if ($conn->query($sql) === TRUE) {
            // Yes
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Seller updated!');
            window.location.href='../../stock_management.php';
            </script>");
        } else {
        echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
?>