<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/9/2018
 * Time: 1:21 PM
 */?>

<?php include("../../config.php"); ?>

<?php

if(!isset($_POST['username'])){
    echo "Could Not Set Username";
    exit();
}

if(!isset($_POST['currentPass']) || !isset($_POST['newPass'])  || !isset($_POST['confirmPass'])) {
    echo "Not all passwords have been set";
    exit();
}

if($_POST['currentPass'] == "" || $_POST['newPass'] == ""  || $_POST['confirmPass'] == "") {
    echo "Please fill in all fields";
    exit();
}

$username = $_POST['username'];
$currentPass = $_POST['currentPass'];
$newPass = $_POST['newPass'];
$confirmPass = $_POST['confirmPass'];

$oldMd5 = md5($currentPass);

$passwordCheck = mysqli_query($connection, "SELECT * FROM users WHERE username='$username' AND password='$oldMd5'");
if(mysqli_num_rows($passwordCheck) != 1) {
    echo "Your current Password is incorrect!";
    exit();
}

if($newPass != $confirmPass) {
    echo "The new passwords Do Not Match!";
    exit();
}

if(preg_match('/[^A-Za-z0-9]/', $newPass)) {
    echo "Please only use letters and numbers!";
    exit();
}

if(strlen($newPass) > 50 || strlen($newPass) < 5) {
    echo "The password must be between 5 and 50 characters!";
    exit();
}

$newMd5 = md5($newPass);

$query = mysqli_query($connection, "UPDATE users SET password='$newMd5' WHERE username='$username'");
echo "Password updated Successfully!";

?>
