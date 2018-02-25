<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/24/2018
 * Time: 7:11 PM
 */

?>

<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
    include("includes/config.php");
    include("includes/classes/Artist.php");
    include("includes/classes/Album.php");
    include("includes/classes/Song.php");

}else{
    include ("includes/header.php");
    include ("includes/footer.php");
$url = $_SERVER['REQUEST_URI'];
    echo "<script>pageOpen('')</script>";
    exit();
}

?>
