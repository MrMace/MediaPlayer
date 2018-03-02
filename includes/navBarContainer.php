<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/1/2018
 * Time: 11:14 PM
 */

?>

<div id="navBarContainer">
    <nav class="navBar">
        <span role="link" tabindex="0" onclick="pageOpen('index.php')" class="logo">
            <img src="assets/images/icons/Logo.png" ">
        </span>


        <div class="sectionGroup">

            <div class="navBtn">
                <span role='link' tabindex="0" onclick="pageOpen('search.php')" class="navBtnLink">
                    Search
                    <img src="assets/images/icons/search.png" class="icon" alt="Search">
                </span>
            </div>

        </div>

        <div class="sectionGroup">

            <div class="navBtn">
                <span role="link" tabindex="0" onclick="pageOpen('profile.php')" class="navBtnLink">
                    User
                </span>
            </div>

            <div class="navBtn">
                <span role="link" tabindex="0" onclick="pageOpen('myMusic.php')"  class="navBtnLink">
                    Your Music
                </span>
            </div>
            <div class="navBtn">
                <span role="link" tabindex="0" onclick="pageOpen('browse.php')" class="navBtnLink">
                    Browse
                </span>
            </div>


        </div>


    </nav>

</div>
