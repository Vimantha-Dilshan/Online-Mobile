<?php
    session_start();

    // Remove Cookie Data
    unset($_SESSION["user"]);

    // Proceed to Sign In Page
    header("Location:../../../sign_in.php");    
?>