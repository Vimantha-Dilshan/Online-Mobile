<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
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
        $stmt = $conn->prepare("INSERT INTO employee_details  (name, gender, address, position, email, nic, mobile_01, mobile_02, birthday, status) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $name, $gender, $address, $position, $email, $nic, $mobile01, $mobile02, $birthday, $status);
        $stmt->execute();

        // Yes
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Employee added to database!');
        window.location.href='../../employee.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>