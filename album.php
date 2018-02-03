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


$artistId = $album['artist'];
$queryArtist = mysqli_query($connection, "SELECT * FROM artist WHERE id='$artistId'");
$artist = mysqli_fetch_array($queryArtist);

echo $album['title'] . "<br>";
echo $artist['name'];
?>


<?php include("includes/footer.php"); ?>
