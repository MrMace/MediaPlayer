<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Matt-->
<!-- * Date: 1/9/2018-->
<!-- */-->


<?php

include("includes/classes/Account.php");

$account = new Account();


include("includes/handlers/reg_handler.php");
include("includes/handlers/login_handler.php");


?>

<html>
<head>
    <title>Mace Media Player</title>
</head>
<body>

<div id="inputContainer">
    <!--        Login  form-->
    <form id="loginForm" action="register.php" method="POST">
        <h2>Login Here</h2>

        <!--        login UserName-->
        <p>
            <label for="loginUsername">Username:</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="Richard Nixon" required>
        </p>
        <!--        login password-->
        <p>
            <label for="loginPassword">Password:</label>
            <input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
        </p>
        <!--log in button-->
        <button type="submit" name="loginBtn">Log In</button>
    </form>


    <!--    register form-->
    <form id="registerForm" action="register.php" method="POST">
        <h2>Sign Up Here</h2>
        <!--       sign up username-->

        <p>
            <?php echo $account->getError("Your username is to long, please keep it under 20 characters."); ?>
            <?php echo $account->getError("Your username is to short, please use more than 5 characters."); ?>
            <label for="signUpUsername">Username:</label>
            <input id="signUpUsername" name="signUpUsername" type="text" placeholder="walkerDestroyer" required>
        </p>
        <!--       first name-->

        <p>
            <?php echo $account->getError("Your first name is to long, please keep it under 50 characters."); ?>
            <?php echo $account->getError("Your first name is to short, please use more than 2 characters."); ?>
            <label for="firstName">First Name:</label>
            <input id="firstName" name="firstName" type="text" placeholder="Daryl" required>
        </p>
        <!--       last name-->

        <p>
            <?php echo $account->getError("Your last name is to long, please keep it under 50 characters."); ?>
            <?php echo $account->getError("Your last name is to short, please use more than 2 characters."); ?>
            <label for="lastName">Last Name:</label>
            <input id="lastName" name="lastName" type="text" placeholder="Dixon" required>
        </p>
        <!--        email address-->

        <p>
            <?php echo $account->getError("Your emails do not match!"); ?>
            <?php echo $account->getError("Your email is not in the correct format! Please use correct format e.g. example@website.com"); ?>
            <label for="email">Email:</label>
            <input id="email" name="email" type="email" placeholder="Your Email" required>
        </p>
        <!--email address confirmation -->
        <p>
            <label for="emailConfirm">Confirm Email:</label>
            <input id="emailConfirm" name="emailConfirm" type="email" placeholder="Your Email" required>
        </p>

        <!--        password-->


        <p>
            <?php echo $account->getError("Your passwords do not match!"); ?>
            <?php echo $account->getError("Your password must only contain numbers and letters."); ?>
            <?php echo $account->getError("Please make your password less than 50 characters"); ?>
            <?php echo $account->getError("Please make your password longer than 6 characters"); ?>
            <label for="password">Password:</label>
            <input id="password" name="password" type="password" placeholder="Password" required>
        </p>
        <!--        password confirm-->
        <p>
            <label for="passwordConfirm">Confirm Password:</label>
            <input id="passwordConfirm" name="passwordConfirm" type="password" placeholder="Password" required>
        </p>
        <!--sign up button-->
        <button type="submit" name="regBtn">Sign Up</button>
    </form>

</div>

</body>
</html>

