<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Matt-->
<!-- * Date: 1/9/2018-->
<!-- * Time: 12:42 PM-->
<!-- */-->

<?php include("includes/header.php"); ?>


<h1 class="pageHeaderH1">More Music You Might Enjoy</h1>

<div class="gridContainer">

    <?php $queryAlbum = mysqli_query($connection, "SELECT * FROM albums ORDER BY RAND() LIMIT 6");

    while ($row = mysqli_fetch_array($queryAlbum)) {


        echo "<div class='gridItem'>  
<a href='album.php?id=" . $row['id'] . "'>
   <img src='" . $row['art'] . "'>
   
   
  <div class='gridItemInfo'>  "
            . $row['title'] .
            "</div> </a></div>";



    }
    ?>
</div>

<?php include("includes/footer.php"); ?>




