<?php
  // Establish the Connection
  include '../config/database_config.php';

  // Get form data
  $productName = $_POST['txtProductName'];
  $description = $_POST['txtDescription'];

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	//$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO product_details (name, image, description) VALUES ($productName, '$image', '$description')";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

    echo $msg;
  }
  $result = mysqli_query($conn, "SELECT * FROM images");
?>
