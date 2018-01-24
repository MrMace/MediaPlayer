<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Matt-->
<!-- * Date: 1/9/2018-->
<!-- * Time: 12:42 PM-->
<!-- */-->

<?php

include("includes/config.php");

//log user out on refresh
//session_destroy();

//checks to see if user is signed in if so move to index if not back to sign in page.
if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("LOCATION: register.php");
}


?>
<html>
<head>
    <title>Mace Media Player</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<div id="mediaPlayerBarContain">

    <div id="mediaPlayerBar">

        <div id="playerLeft">
            <div class="content">
                <span class="albumLink">
                    <img src="assets/images/placeHolder/albumPlaceholder.jpeg" class="albumImage">
                </span>
                <div class="albumInfo">
                    <span class="trackName">
                        <span>Song Name</span>
                    </span>
                    <span class="artistName">
                        <span>Artist Name</span>
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

                    <button class="controlBtn play" title="Play Button">
                        <img src="assets/images/icons/playBtn.png" alt="play">
                    </button>

                    <button class="controlBtn pause" title="Pause Button" style="display: none">
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

</body>
</html>



