<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/15/2018
 * Time: 5:20 PM
 */

?>

<?php

include("../../config.php");

if (isset($_POST['songId'])) {

    $songId = $_POST['songId'];

    $query = mysqli_query($connection, "SELECT * FROM songs WHERE id = '$songId'");

    $resultArray = mysqli_fetch_array($query);

    echo json_encode($resultArray);
}
?>