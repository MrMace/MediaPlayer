<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/16/2018
 * Time: 9:54 AM
 */
?>


<?php

include("../../config.php");

if (isset($_POST['albumId'])) {

    $albumId = $_POST['albumId'];

    $query = mysqli_query($connection, "SELECT * FROM albums WHERE id = '$albumId'");

    $resultArray = mysqli_fetch_array($query);

    echo json_encode($resultArray);
}
?>
