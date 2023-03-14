<?php 

    $server = "sql305.byethost17.com";
    $user = "b17_32472599";
    $password = "#Pathum0718458146";
    $database = "b17_32472599_online_mobile";

    //$server = "localhost";
    //$user = "root";
    //$password = "";
    //$database = "online_mobile";


    // Establish the Connection
    $conn = mysqli_connect($server, $user, $password, $database);

    // Check the Connection
    if (!$conn) {
        die("<script>alert('Database Connection Failed!')</script>");
    }

?>