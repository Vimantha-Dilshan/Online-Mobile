<?php
    // Establish the Connection
    include '../config/database_config.php';
    
    // Get form data
    $id = $_POST['txtID'];
    $name = $_POST['txtName'];
    $gender = $_POST['txtGender'];
    $address = $_POST['txtAddress'];
    $position = $_POST['txtPosition'];
    $email = $_POST['txtEmail'];
    $nic = $_POST['txtNic'];
    $mobile01 = $_POST['txtMobile01'];
    $mobile02 = $_POST['txtMobile02'];
    $birthday = $_POST['txtBirthday'];
    $status = $_POST['txtStatus'];

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {

        $sql = "UPDATE `employee_details` SET `name` = '$name', `gender` = '$gender', `address` = '$address', `position` = '$position', `email` = '$email', `nic` = '$nic', `mobile_01` = '$mobile01', `mobile_02` = '$mobile02', `birthday` = '$birthday', `status` = '$status' WHERE `employee_details`.`id` = $id; ";

        if ($conn->query($sql) === TRUE) {
            // Yes
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Employee details updated!');
            window.location.href='../../employee.php';
            </script>");
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
?>