<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/2/2018
 * Time: 5:25 PM
 */?>

<?php include("../../config.php");

if(isset($_POST['plsId'])){
$plsId = $_POST['plsId'];

$queryPlaylist = mysqli_query($connection, "DELETE FROM playlists WHERE id='$plsId'");
$querySongs = mysqli_query($connection, "DELETE FROM playlistsongs WHERE plsId='$plsId'");

}else{
    echo "<script>console.log('List id was not passed to deleteplaylist.php')</script>";
}

?>
