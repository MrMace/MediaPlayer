<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/24/2018
 * Time: 7:11 PM
 */

?>

<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    include("includes/config.php");
    include("includes/classes/User.php");
    include("includes/classes/Artist.php");
    include("includes/classes/Album.php");
    include("includes/classes/Song.php");
    include("includes/classes/Playlist.php");

    if(isset($_GET['userLoggedIn'])){
        $userLoggedIn = new User($connection, $_GET['userLoggedIn']);
    }else {
        echo "Username var was not passed into page. Check pageOpen JS function.";
    }

} else {
    include("includes/header.php");
    include("includes/footer.php");
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>pageOpen('$url')</script>";
    exit();
}

?>
