<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/1/2018
 * Time: 1:04 AM
 */

?>


<?php  include("includes/includedFiles.php");?>

<?php if(isset($_GET['term'])){
    $term =urldecode( $_GET['term']);
}else {
    $term = "";
}


?>


<div class="searchContainer">

    <h4>Search for your favorite Track, Artist, or Album.</h4>
    <input type="text" class="searchInput" value="<?php echo $term ?>" placeholder="Start Typing..." onfocus="var val=this.value; this.value=''; this.value= val;">
</div>



<script>
$(function() {


var timer;

// cancels timer resets new one
$(".searchInput").keyup(function(){
clearTimeout(timer);

timer = setTimeout(function() {
    var val = $(".searchInput").val();
    pageOpen("search.php?term=" + val);
}, 1000)
});
    // soon as page loads focus on search input
    $(".searchInput").focus();
});

    </script>




<div class="songListContainer borderBottom">

    <?php
    if($term == ""){
        echo "<h2>Popular Songs</h2>";
    }else {
        echo "<h2>Songs that match</h2>";
    }

    ?>
<!--    <h2>Songs that Match</h2>-->
    <ul class="songList">

        <?php
        $songsQuery = mysqli_query($connection, "SELECT id FROM songs WHERE title LIKE '%$term%' LIMIT 10");
        if(!mysqli_num_rows($songsQuery)) {
            echo "<span class='noResults'> Sorry No Tracks Matched" . $term . "</span>";
        };
        $songIdArray = array();
        $i = 1;
        while($row = mysqli_fetch_array($songsQuery)) {
//            breaks if more than 5 songs avail
            if($i > 20){

                break;
            }

            array_push($songIdArray, $row['id']);

            $albumTrack = new Song($connection,  $row['id']);
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

