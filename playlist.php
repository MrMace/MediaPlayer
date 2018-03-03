<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/2/2018
 * Time: 2:46 PM
 */
?>

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
    $plsId = $_GET['id'];
} else {
    header("Location: index.php");
}
$playlist = new Playlist($connection, $plsId);
$playlistOwner = new User($connection, $playlist->getOwner());
?>

<div class="playlistTopInfo">

    <div class="playlistSectionLeft">
    <div class="playlistPageImg">
        <img src="assets/images/placeHolder/playlistIcon.png">
    </div>
</div>

    <div class="playlistSectionRight">
        <h1><?php echo $playlist->getName(); ?></h1>
        <p>Playlist Owner: <?php echo $playlist->getOwner(); ?></p>

        <p><?php echo $playlist->getNumSongs(); ?> Tracks</p>
        <button class="button" onclick="deletePlaylist('<?php echo $plsId; ?>')">Delete Playlist</button>

    </div>
</div>


<div class="songListContainer">
    <ul class="songList">

        <?php
        $songIdArray = $playlist->getSongIds();
        $i = 1;
        foreach ($songIdArray as $plsSongId) {

            $playlistTrack = new Song($connection, $plsSongId);
            $songArtist = $playlistTrack->getArtist();
//output all the tracks
            echo "<li class='trackListRow'>
<div class='trackCount'>
<img class='play' src='assets/images/icons/trackPlay.png' onclick='setTrack(\"" . $playlistTrack->getId() ."\", tempPlayList, true)'>
<span class='trackNum'>$i</span>
</div>

<div class='trackInfo'>
<span class='trackName'>" . $playlistTrack->getTitle() . "</span>
<span class='artistName'>" . $songArtist->getName() . "</span>
</div>

<div class='trackOptions'>
<img class='optionsBtn' src='assets/images/icons/more.png'/>
</div>
<div class='songDuration'>
<span class='duration'>" . $playlistTrack->getDuration() . "</span>
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


