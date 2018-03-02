<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/1/2018
 * Time: 3:56 PM
 */?>


<?php
include("../../config.php");

if(isset($_POST['name']) && isset($_POST['username'])){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $date = date("m-d-y");

    $query = mysqli_query($connection, "INSERT INTO playlists VALUES('', '$name', '$username', '$date')");

}else {
    echo "name or username parameters not passed into file";
};
?>


