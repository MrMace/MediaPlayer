<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/28/2018
 * Time: 12:24 PM
 */

?>


<?php include("includes/includedFiles.php");  ?>


<?php
if(isset($_GET['id'])) {
$artistId = $_GET['id'];
}
//else {
//header("Location: index.php");
//}


$artist = new Artist($connection, $artistId);

?>

<div class="albumTopInfo borderBottom">
    <div class="centerSection">
        <div class="artistInfo">
        <h1 class="artistName"><?php echo $artist->getName();   ?></h1>

            <div class="headerButtons">
                <button class="button">Play</button>
            </div>
        </div>

    </div>
</div>


<div class="songListContainer borderBottom">
    <ul class="songList">

        <?php
        $songIdArray = $artist->getSongIds();
        $i = 1;
        foreach ($songIdArray as $songId) {
//            breaks if more than 5 songs avail
            if($i > 5){

                break;
            }

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


