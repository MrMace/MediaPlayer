<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/22/2018
 * Time: 6:00 PM
 */
?>


<?php

include("../../config.php");

if (isset($_POST['songId'])) {

    $songId = $_POST['songId'];

    $query = mysqli_query($connection, "UPDATE songs SET plays = plays + 1 WHERE id ='$songId'");

}
?>

