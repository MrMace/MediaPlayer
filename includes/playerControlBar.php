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
        var newPlayList = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        setTrack(newPlayList[0], newPlayList, false);
        updateVolBar(audioElement.audio);
// prevent blue highlights
        $("#mediaPlayerBarContain").on("mousedown touchstart mousemove touchmove", function (e) {
            e.preventDefault();
        });

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

function setMute(){
    audioElement.audio.muted = !audioElement.audio.muted;
    var imgName = audioElement.audio.muted? "ActiveVolMute.png": "muteBtn.png";
    $(".controlBtn.volume img").attr("src", "assets/images/icons/" + imgName);

}

function setShuffle(){
    shuffle = !shuffle;
    var imgName = shuffle? "ActiveShuffleBtn.png": "shuffleBtn.png";
    $(".controlBtn.shuffle img").attr("src", "assets/images/icons/" + imgName);

    if(shuffle){
        //random playlist
        shuffleArray(shufflePlayList);
        //keeps from repeating a song
        currentPlayList = shufflePlayList.indexOf(audioElement.currentlyPlaying.id);
    }else{
        // shuffle deactivate
        // go to reg playlist
        //keeps from repeating a song
        currentIndex = currentPlayList.indexOf(audioElement.currentlyPlaying.id);


    }


}

function shuffleArray(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i];
        a[i] = a[j];
        a[j] = x;
    }
}

    function timeFromOffset(mouse,progressBar) {

        var percentage = mouse.offsetX/ $(progressBar).width() * 100;
        var seconds = audioElement.audio.duration * (percentage/ 100);
        audioElement.setTime(seconds);

    }

    function prevSong(){
        if(audioElement.audio.currentTime >= 5 || currentIndex == 0 ){
            audioElement.setTime(0);

        }else{
            currentIndex = currentIndex - 1;
            setTrack(currentPlayList[currentIndex], currentPlayList, true);
        }
    }

    function nextSong(){

        if(repeat == true){
            audioElement.setTime(0);
            playTrack();
            return;
        }
        if(currentIndex == currentPlayList.length -1){
            currentIndex = 0;
        }else{
            currentIndex++;
        }

        var trackToPlay = shuffle ? shufflePlayList[currentIndex]: currentPlayList[currentIndex];
        setTrack(trackToPlay, currentPlayList, true);
    }

    function setRepeat(){
        //simple way of saying if true equal false else true
        repeat = !repeat;
        var imgName = repeat? "ActiveRepeatBtn.png": "repeatBtn.png";
        $(".controlBtn.repeat img").attr("src", "assets/images/icons/" + imgName);

    }

    function setTrack(trackId, newPlayList, play) {

        if(newPlayList != currentPlayList){

            currentPlayList = newPlayList;
            shufflePlayList = currentPlayList.slice();
            shuffleArray(shufflePlayList);
        }

        if(shuffle){
            currentIndex = shufflePlayList.indexOf(trackId);
        }else{
            currentIndex = currentPlayList.indexOf(trackId);
        }

        pauseTrack();
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
           playTrack();


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
                    <button class="controlBtn shuffle" title="Shuffle Button" onclick="setShuffle()">
                        <img src="assets/images/icons/shuffleBtn.png" alt="shuffle">
                    </button>

                    <button class="controlBtn previous" title="Previous Button" onclick="prevSong()">
                        <img src="assets/images/icons/backBtn.png" alt="previous">
                    </button>

                    <button class="controlBtn play" title="Play Button" onclick="playTrack()">
                        <img src="assets/images/icons/playBtn.png" alt="play">
                    </button>

                    <button class="controlBtn pause" title="Pause Button" style="display: none" onclick="pauseTrack()">
                        <img src="assets/images/icons/pauseBtn.png" alt="pause">
                    </button>

                    <button class="controlBtn next" title="Next Button" onclick="nextSong()">
                        <img src="assets/images/icons/nextBtn.png" alt="next">
                    </button>

                    <button class="controlBtn repeat" title="Repeat Button" onclick="setRepeat()">
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
                <button class="controlBtn volume" title="Volume Button" onclick="setMute()">
                    <img src="assets/images/icons/MaxVolBtn.png" alt="Volume">
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
