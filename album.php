<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/3/2018
 * Time: 12:26 PM
 */

?>

<?php include("includes/includedFiles.php");?>

<?php

if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    header("Location: index.php");
}

$album = new Album($connection, $albumId);

$artist = $album->getArtist();
$artistId = $artist->getId();
?>

<div class="albumTopInfo">

    <div class="albumSectionLeft">
        <img src="<?php echo $album->getArt(); ?>"/>
    </div>

    <div class="albumSectionRight">
        <h1><?php echo $album->getTitle(); ?></h1>
        <p role="link" tabindex="0" onclick="pageOpen('artist.php?id=<?php echo $artistId; ?>')">By <?php echo $artist->getName(); ?></p>
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
<input type='hidden' class='trackId' value='".  $albumTrack->getId()  . "'>
<img class='optionsBtn' src='assets/images/icons/more.png' onclick='showOptionMenu(this)'/>
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

<nav class="optionMenu">
    <input type="hidden" class="trackId">
<?php echo Playlist::addToPlaylistDropdown($connection, $userLoggedIn->getUsername()); ?>
    <div class="item">Add to playlist</div>
    <div class="item">Add to playlist</div>
</nav>


