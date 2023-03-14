<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $productName = $_POST['txtProductName'];
    $brand = $_POST['txtBrand'];
    $category = $_POST['txtCategory'];
    $seller = $_POST['txtSeller'];
    $buyingPrice = $_POST['txtBuyingPrice'];
    $sellingPrice = $_POST['txtSellingPrice'];
    $status = $_POST['txtStatus'];
    $date = $_POST['txtDate'];
    $qty = $_POST['txtQty'];
    $importModel = "Yes";

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO stock_items (product_name, brand, category, seller, buying_price, selling_price, status, date, quantity, import_model) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssddssis", $productName, $brand, $category, $seller, $buyingPrice, $sellingPrice, $status, $date, $qty, $importModel);
        $stmt->execute();

        // Yes
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Product added to database!');
        window.location.href='../../stock_management.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>