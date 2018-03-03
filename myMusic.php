<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/1/2018
 * Time: 3:14 PM
 */
?>

<?php include("includes/includedFiles.php");?>

<div class="playlistContain">
    <div class="gridContainer">
        <h2>Playlists</h2>
        <div class="btnItems">
            <button class="button" onclick="createPlaylist()">New Playlist</button>
        </div>


        <?php
        $username = $userLoggedIn->getUsername();

        $queryPlaylist = mysqli_query($connection, "SELECT * FROM playlists WHERE playlistOwner = '$username'");

    if (!mysqli_num_rows($queryPlaylist)) {
        echo "<span class='noResults'> Currently you do not have any playlist</span>";
    }

        while ($row = mysqli_fetch_array($queryPlaylist)) {

        $playlist = new Playlist($connection, $row);


            echo "<div class='gridItem' role='link' tabindex='0' onclick='pageOpen(\"playlist.php?id=" . $playlist->getId(). "\")'>  
   <div class='playlistImg'>
   
   <img class='img_on' src='assets/images/placeHolder/playlistIcon.png'>
   <img class='img_off' src='assets/images/placeHolder/ActivePlaylistIcon.png'>
</div>
   
  <div class='gridItemInfo'>  "
                . $playlist->getName() .
                "</div></div>";

    }

    ?>





    </div>
</div>
