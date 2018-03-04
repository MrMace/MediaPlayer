<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/3/2018
 * Time: 2:13 PM
 */?>
<?php include("../../config.php");

if(isset($_POST['plsId']) && isset($_POST['trackId']) ){
    $plsId = $_POST['plsId'];
    $trackId = $_POST['trackId'];

   $queryOrderId = mysqli_query($connection, "SELECT MAX(plsOrder) + 1 AS plsOrder FROM playlistsongs WHERE trackId = '$trackId'");
   $row = mysqli_fetch_array($queryOrderId);
   $plsOrder = $row['plsOrder'];

   $query = mysqli_query($connection, "INSERT INTO playlistsongs VALUES('', '$trackId','$plsId', '$plsOrder')");

}else{
    echo "<script>console.log('List id was not passed to deleteplaylist.php')</script>";
}

?>


