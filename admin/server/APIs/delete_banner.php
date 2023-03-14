<?php
// Establish the Connection
include '../config/database_config.php';

error_reporting(0);

$id = $_GET['rn'];


$querySelect = "select * from banners where id = '$id'";
$ResultSelectStmt = mysqli_query($conn, $querySelect);
$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

$fetchImgTitleName = $fetchRecords['image'];

$createDeletePath = "images/banners/" . $fetchImgTitleName;

if (unlink($createDeletePath)) {
    $liveSqlQQ = "delete from banners where id = '$id'";
    $rsDelete = mysqli_query($conn, $liveSqlQQ);

    if ($rsDelete) {
        header('location:../../site_banners.php?success=true');
        exit();
    }
} else {
    $displayErrMessage = "Sorry, Unable to delete Image";
}

?>
