<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/4/2018
 * Time: 11:07 AM
 */?>

<?php
include("../../config.php");

if(isset($_POST['plsId']) && isset($_POST['trackId'])){
    $plsId = $_POST['plsId'];
    $trackId = $_POST['trackId'];

$query = mysqli_query($connection, "DELETE FROM playlistsongs WHERE plsId='$plsId' AND trackId='$trackId'");
}else{
    echo "<script>console.log('Error ids did not pass' + plsId + trackId)</script>";
}

?>
