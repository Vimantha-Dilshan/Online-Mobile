<?php
    // Establish the Connection
    include '../config/database_config.php';

    // Get form data
    $title = $_POST['txtTitle'];
    $subTitle = $_POST['txtSubTitle'];
    $description = $_POST['txtDescription'];
    $image = $_FILES['image']['name'];

    // Initialize alert message variable
    $msg = "";

    if($conn->connect_error) {
        die('Connection Error : '.$conn->connect_error);
    } else {
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $newfilename = date("Ymdhis").".".$extension;

        // image file directory
  	    //$target = "images/banners/".basename($image);
        $target = "images/banners/".$newfilename;
        
        $stmt = $conn->prepare("INSERT INTO banners (title,sub_title,description,image) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss",$title, $subTitle, $description, $newfilename);
        $stmt->execute();

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Banner added to website!";
        }else{
            $msg = "Failed to add to website";
        }

        echo ("<script LANGUAGE='JavaScript'>
        window.alert('".$msg."');
        window.location.href='../../site_banners.php';
        </script>");

        $stmt->close();
        $conn->close();
    }
?>
