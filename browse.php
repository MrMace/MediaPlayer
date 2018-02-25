<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/24/2018
 * Time: 8:10 PM
 */
?>

<?php include("includes/includedFiles.php");?>

<h1 class="pageHeaderH1">More Music You Might Enjoy</h1>

<div class="gridContainer">

    <?php $queryAlbum = mysqli_query($connection, "SELECT * FROM albums ORDER BY RAND() LIMIT 6");

    while ($row = mysqli_fetch_array($queryAlbum)) {


        echo "<div class='gridItem'>  
<span role='link' tabindex='0' onclick='pageOpen(\"album.php?id=" . $row['id'] . "\")'>
   <img src='" . $row['art'] . "'>
   
   
  <div class='gridItemInfo'>  "
            . $row['title'] .
            "</div> </span></div>";



    }
    ?>
</div>






