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

$album = new Album($connection, $albumId);

$artist = $album->getArtist();


echo $album->getTitle() . "<br>";
echo $artist->getName();
?>


<?php include("includes/footer.php"); ?>
