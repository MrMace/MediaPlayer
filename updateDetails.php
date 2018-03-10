<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/8/2018
 * Time: 4:43 PM
 */?>
<?php include("includes/includedFiles.php"); ?>


<div class="userDetails">
    <div class="container">
        <h1>Email</h1>

        <input type="text" class="email" name="email" placeholder="Email Address" value="<?php echo $userLoggedIn->getEmail(); ?>">
        <span class="message"></span>
        <button class="button" onclick="updateEmail('email')">Save</button>

    </div>
    <div class="container">
        <h1>Password</h1>
        <input type="password" class="currentPass" name="currentPass" placeholder="Current Password">
        <input type="password" class="newPass" name="newPass" placeholder="New Password" >
        <input type="password" class="confirmPass" name="confirmPass" placeholder="Confirm New Password">
        <span class="message"></span>
        <button class="button" onclick="updatePass('currentPass', 'newPass', 'confirmPass')">Save</button>
    </div>
</div>

