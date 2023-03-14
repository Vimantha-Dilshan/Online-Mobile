<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $name = $_POST['txtName'];
    $email= $_POST['txtEmail'];
    $password = $_POST['txtPassword'];
    $role = $_POST['txtRole'];

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO admin_authentication (name, email, password, access_level) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $name, $email, $password, $role);
        $stmt->execute();

        // Yes
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Admin role set succefully!');
        window.location.href='../../employee.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>