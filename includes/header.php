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
include("includes/classes/User.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");
include("includes/classes/Playlist.php");

//log user out on refresh
//session_destroy();

//checks to see if user is signed in if so move to index if not back to sign in page.
if (isset($_SESSION['userLoggedIn'])) {
//    $userLoggedIn = $_SESSION['userLoggedIn'];
    $userLoggedIn = new User($connection, $_SESSION['userLoggedIn']);
    $username = $userLoggedIn->getUsername();
    echo "<script>userLoggedIn = '$username';</script>";
} else {
    header("LOCATION: register.php");
}


?>
<html>
<head>
    <meta name="mobile-web-app-capable" content="yes">
    <title>Mace Media Player</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js\lib\jquery-3.2.1.min .js"></script>
    <script src="js\script.js"></script>
</head>
<body>

<!--<script>-->
<!---->
<!--    var audioElement = new Audio();-->
<!--    audioElement.setTrack("assets/music/Burnin_Both_Ends/bad-habits.mp3");-->
<!--    audioElement.audio.play();-->
<!---->
<!--</script>-->


<div id="mainContainer">

    <div id="containerTop">
        <?php include("includes/navBarContainer.php"); ?>


        <div id="mainScreenContainer">

            <div id="mainContent">


