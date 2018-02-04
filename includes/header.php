<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/3/2018
 * Time: 9:32 AM
 */

?>


<?php

include("includes/config.php");
include("includes/classes/Artist.php");

//log user out on refresh
//session_destroy();

//checks to see if user is signed in if so move to index if not back to sign in page.
if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("LOCATION: register.php");
}


?>
<html>
<head>
    <title>Mace Media Player</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<div id="mainContainer">

    <div id="containerTop">
        <?php include("includes/navBarContainer.php"); ?>


        <div id="mainScreenContainer">

            <div id="mainContent">


