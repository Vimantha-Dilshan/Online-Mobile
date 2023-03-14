<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $name = $_POST['txtName'];
    $salary = $_POST['txtSalary'];
    $bonus = $_POST['txtBonus'];
    $total = $salary + $bonus;
    $date = $_POST['txtDate'];

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO  bonus_salary (name, salary, bonus, total, date) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sddds", $name, $salary, $bonus, $total, $date);
        $stmt->execute();

        // Yes
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Bonus Salary added to database!');
        window.location.href='../../employee.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>