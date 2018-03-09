<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/9/2018
 * Time: 11:16 AM
 */?>

<?php include("../../config.php"); ?>

<?php

if(!isset($_POST['username'])){
    echo "Could Not Set Username";
    exit();
}

if(isset($_POST['email']) && $_POST['email'] != ""){
    $username = $_POST['username'];
    $email = $_POST['email'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "This Email Is Not Valid";
        exit();
    }

    $emailCheck = mysqli_query($connection, "SELECT email FROM users WHERE email='$email' AND username != '$username'");
    if(mysqli_num_rows($emailCheck)> 0) {
        echo "This email address is already being used.";
        exit();
    }

    $queryUpdate = mysqli_query($connection, "UPDATE users SET email = '$email'  WHERE username = '$username'");
    echo "Email Updated Successfully";

} else{
    echo "Please Provide an email";
}

?>
