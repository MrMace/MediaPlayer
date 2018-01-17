<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 1/14/2018
 * Time: 5:45 PM
 */




//if login button is pressed
if (isset($_POST['loginBtn'])) {

    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $result = $account->login($username, $password);

    if ($result == true) {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }

}


?>