<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $id = $_POST['txtID'];
    $productName = $_POST['txtProductName'];
    $brand = $_POST['txtBrand'];
    $category = $_POST['txtCategory'];
    $seller = $_POST['txtSeller'];
    $buyingPrice = $_POST['txtBuyingPrice'];
    $sellingPrice = $_POST['txtSellingPrice'];
    $status = $_POST['txtStatus'];
    $date = $_POST['txtDate'];
    $qty = $_POST['txtQty'];
    //$importModel = $_POST['txtImportModel'];

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {

        $sql = "UPDATE `stock_items` SET `product_name` = '$productName', `brand` = '$brand', `category` = '$category', `seller` = '$seller', `buying_price` = '$buyingPrice', `selling_price` = '$sellingPrice', `status` = '$status', `date` = '$date', `quantity` = '$qty', `import_model` = 'Yes' WHERE `stock_items`.`id` = $id; ";

        if ($conn->query($sql) === TRUE) {
            // Yes
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Product updated!');
            window.location.href='../../stock_management.php';
            </script>");
        } else {
        echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
?>