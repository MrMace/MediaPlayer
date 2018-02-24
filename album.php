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


<div class="songListContainer">
    <ul class="songList">

        <?php
        $songIdArray = $album->getSongIds();
        $i = 1;
        foreach ($songIdArray as $songId) {

            $albumTrack = new Song($connection, $songId);
            $albumArtist = $albumTrack->getArtist();
//output all the tracks
            echo "<li class='trackListRow'>
<div class='trackCount'>
<img class='play' src='assets/images/icons/trackPlay.png' onclick='setTrack(\"" . $albumTrack->getId() ."\", tempPlayList, true)'>
<span class='trackNum'>$i</span>
</div>

<div class='trackInfo'>
<span class='trackName'>" . $albumTrack->getTitle() . "</span>
<span class='artistName'>" . $albumArtist->getName() . "</span>
</div>

<div class='trackOptions'>
<img class='optionsBtn' src='assets/images/icons/more.png'/>
</div>
<div class='songDuration'>
<span class='duration'>" . $albumTrack->getDuration() . "</span>
</div>
</li>";

            $i++;
        }
        ?>

<script>
    // converts php array into json
    var tempTrackIds = '<?php echo json_encode($songIdArray); ?>';
    // converts json into object to access
    tempPlayList = JSON.parse(tempTrackIds);
</script>

    </ul>


</div>

<?php include("includes/footer.php"); ?>
