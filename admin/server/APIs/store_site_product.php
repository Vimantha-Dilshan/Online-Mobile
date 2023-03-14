<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $productName = $_POST['txtProductName'];
    $description = $_POST['txtDescription'];
    $price = $_POST['txtPrice'];
    $category = $_POST['txtCategory'];
    $image = $_FILES['image']['name'];

    // Initialize alert message variable
    $msg = "";

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $newfilename = date("Ymdhis").".".$extension;

        // image file directory
  	    //$target = "images/".basename($image);
        $target = "images/".$newfilename;

        $stmt = $conn->prepare("INSERT INTO product_details (name,image,description,price,category) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss", $productName, $newfilename, $description, $price, $category);
        $stmt->execute();

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Product added to website!";
        }else{
            $msg = "Failed to add to website";
        }

        echo ("<script LANGUAGE='JavaScript'>
        window.alert('".$msg."');
        window.location.href='../../site_products.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>
