<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/1/2018
 * Time: 11:18 PM
 */


//Query to select 10 songs by random
$songQuery = mysqli_query($connection, "SELECT * FROM songs ORDER BY RAND() LIMIT 10");

$songArray = array();

while ($row = mysqli_fetch_array($songQuery)) {

    array_push($songArray, $row['id']);
}


$jsonArray = json_encode($songArray);
?>


<script>

// progress bar
    $(document).ready(function () {
        currentPlayList = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        setTrack(currentPlayList[0], currentPlayList, false);

                $(".playbackBar .progressBar").mousedown(function (){

                   mouseDown = true;
                });

                $(".playbackBar .progressBar").mousemove(function (e){

                   if(mouseDown){
                       // sets song time depending on position of mouse
                       timeFromOffset(e, this);
                   }
                });
                $(".playbackBar .progressBar").mouseup(function (e){
                    timeFromOffset(e, this);
                });


                //vol bar
        $(".volBar .progressBar").mousedown(function (){

            mouseDown = true;
        });

        $(".volBar .progressBar").mousemove(function (e){

            if(mouseDown){
                // sets vol time depending on position of mouse
                var percentage = e.offsetX / $(this).width();
                if(percentage >= 0 && percentage <= 1){
                    audioElement.audio.volume = percentage;
                }

            }
        });
        $(".volBar .progressBar").mouseup(function (e){


            var percentage = e.offsetX / $(this).width();
            if(percentage >= 0 && percentage <= 1){
                audioElement.audio.volume = percentage;
            }
        });

                $(document).mouseup(function(){
                    mouseDown = false;
                })

    });

    function timeFromOffset(mouse,progressBar) {

        var percentage = mouse.offsetX/ $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage/ 100);
        audioElement.setTime(seconds);

    }

    function setTrack(trackId, newPlaylist, play) {
        //AJAX Call for trackID
        $.post("includes/handlers/ajax/getSongJson.php", {songId: trackId}, function (data) {


            var track = JSON.parse(data);


            $(".trackName span").text(track.title);

//            AJAX call for artist name
            $.post("includes/handlers/ajax/getArtistJson.php", {artistId: track.artist}, function (data) {
                var artist = JSON.parse(data);
                $(".artistName span").text(artist.name);
            });

            //            AJAX call for album
            $.post("includes/handlers/ajax/getAlbumJson.php", {albumId: track.album}, function (data) {
                var album = JSON.parse(data);
                $(".albumLink img").attr("src", album.art);
            });


            audioElement.setTrack(track);
//            playTrack();


        });


//        audioElement.setTrack("assets/music/fighter/04_human.mp3");
        if (play) {

            audioElement.play();
        }

    }

    function playTrack() {

        if (audioElement.audio.currentTime == 0) {
            $.post("includes/handlers/ajax/updatePlays.php", {songId: audioElement.currentlyPlaying.id});
        } else {
            console.log("Dont");
        }

        $(".controlBtn.play").hide();
        $(".controlBtn.pause").show();
        audioElement.play();
    }

    function pauseTrack() {

        $(".controlBtn.play").show();
        $(".controlBtn.pause").hide();
        audioElement.pause();
    }

</script>


<div id="mediaPlayerBarContain">

    <div id="mediaPlayerBar">

        <div id="playerLeft">
            <div class="content">
                <span class="albumLink">
                    <img src="" class="albumImage">
                </span>
                <div class="albumInfo">
                    <span class="trackName">
                        <span></span>
                    </span>
                    <span class="artistName">
                        <span></span>
                    </span>
                </div>
            </div>

        </div>

        <div id="playerCenter">
            <div class="content playerControls">
                <div class="btns">
                    <button class="controlBtn shuffle" title="Shuffle Button">
                        <img src="assets/images/icons/shuffleBtn.png" alt="shuffle">
                    </button>

                    <button class="controlBtn previous" title="Previous Button">
                        <img src="assets/images/icons/backBtn.png" alt="previous">
                    </button>

                    <button class="controlBtn play" title="Play Button" onclick="playTrack()">
                        <img src="assets/images/icons/playBtn.png" alt="play">
                    </button>

                    <button class="controlBtn pause" title="Pause Button" style="display: none" onclick="pauseTrack()">
                        <img src="assets/images/icons/pauseBtn.png" alt="pause">
                    </button>

                    <button class="controlBtn next" title="Next Button">
                        <img src="assets/images/icons/nextBtn.png" alt="next">
                    </button>

                    <button class="controlBtn repeat" title="Repeat Button">
                        <img src="assets/images/icons/repeatBtn.png" alt="repeat">
                    </button>
                </div>
                <div class="playbackBar">
                    <span class="progressTime current">0.00</span>
                    <div class="progressBar">
                        <div class="progressBarBG">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <span class="progressTime remaining">0.00</span>
                </div>
            </div>

        </div>

        <div id="playerRight">
            <div class="volBar">
                <button class="controlBtn volume" title="Volume Button">
                    <img src="assets/images/icons/MaxVolBtn.png" alt="Volume"
                </button>

                <div class="progressBar">
                    <div class="progressBarBG">
                        <div class="progress"></div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
