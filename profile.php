<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/7/2018
 * Time: 6:12 PM
 */?>


<?php include("includes/includedFiles.php");?>

<div class="albumTopInfo">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $userLoggedIn->getFAndLName(); ?></h1>
            <div class="headerButtons">
                <button class="button" onclick="pageOpen('updateDetails.php')">Details</button>
                <button class="button" onclick="logout()">Logout</button>
            </div>
        </div>
    </div>
</div>
