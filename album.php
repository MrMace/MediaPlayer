<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/3/2018
 * Time: 12:26 PM
 */

?>

<?php include("includes/header.php"); ?>

<?php

if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    header("Location: index.php");
}

$queryAlbum = mysqli_query($connection, "SELECT * FROM albums WHERE id='$albumId'");

$album = mysqli_fetch_array($queryAlbum);


$artist = new Artist($connection, $album['artist']);


echo $album['title'] . "<br>";
echo $artist->getName();
?>


<?php include("includes/footer.php"); ?>
