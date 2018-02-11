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
?>

<div class="albumTopInfo">

    <div class="albumSectionLeft">
        <img src="<?php echo $album->getArt(); ?>"/>
    </div>

    <div class="albumSectionRight">
        <h1><?php echo $album->getTitle(); ?></h1>
        <p><?php echo $artist->getName(); ?></p>
        <p><?php echo $album->getAlbumNumSongs(); ?> Tracks</p>

    </div>
</div>

<?php include("includes/footer.php"); ?>
