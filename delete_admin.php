<?php
    include 'includes/myfirebase.php';

    $username_admin_url = $_GET['username_url'];

    $reference = 'Admin/'.$username_admin_url;
    $pushData = $database->getReference($reference)->remove();


        // lempar ke customer.php
        header('location: includes/user_destroy.php');

?>