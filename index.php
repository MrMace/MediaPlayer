<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Matt-->
<!-- * Date: 1/9/2018-->
<!-- * Time: 12:42 PM-->
<!-- */-->

<?php include("includes/header.php"); ?>


<h1 class="pageHeaderH1">More Music You Might Enjoy</h1>

<div class="gridContainer">

    <?php $queryAlbum = mysqli_query($connection, "SELECT * FROM albums");

    while ($row = mysqli_fetch_array($queryAlbum)) {
        echo $row['title'] . "<br>";

    }
    ?>
</div>

<?php include("includes/footer.php"); ?>




