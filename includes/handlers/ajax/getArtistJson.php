<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/16/2018
 * Time: 8:04 AM
 */


?>


<?php

include("../../config.php");

if (isset($_POST['artistId'])) {

    $artistId = $_POST['artistId'];

    $query = mysqli_query($connection, "SELECT * FROM artist WHERE id = '$artistId'");

    $resultArray = mysqli_fetch_array($query);

    echo json_encode($resultArray);
}


?>


