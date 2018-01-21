<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Matt-->
<!-- * Date: 1/9/2018-->
<!-- */-->


<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($connection);


include("includes/handlers/reg_handler.php");
include("includes/handlers/login_handler.php");


//holds value of form input
function getFormInputVal($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>

<html>
<head>
    <title>Mace Media Player</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script src="js/lib/jquery-3.2.1.min%20.js"></script>
    <script src="js/register.js"></script>


</head>
<body>
<?php

if (isset($_POST['regBtn'])) {

    echo '<script>$(document).ready(function(){
     $("#loginForm").hide();
    $("#registerForm").show();
}); </script>';
} else {
    echo '<script>$(document).ready(function(){
     $("#loginForm").show();
    $("#registerForm").hide();
}); </script>';

}

?>

<div id="background">
    <div id="loginContainer">
        <div id="inputContainer">
            <!--        Login  form-->
            <form id="loginForm" action="register.php" method="POST">
                <h2>Login Here</h2>

                <!--        login UserName-->
                <p>
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    <label for="loginUsername">Username:</label>
                    <input id="loginUsername" name="loginUsername" type="text" placeholder="Richard Nixon"
                           value="<?php getFormInputVal('loginUsername') ?>" required>
                </p>
                <!--        login password-->
                <p>
                    <label for="loginPassword">Password:</label>
                    <input id="loginPassword" name="loginPassword" type="password" placeholder="Password"
                           value="<?php getFormInputVal('loginPassword') ?>" required>
                </p>
                <!--log in button-->
                <button type="submit" name="loginBtn">Log In</button>

                <div class="haveAccountText">
                    <span id="hideLogin">No account? Sign up today!</span>
                </div>
            </form>


            <!--    register form-->
            <form id="registerForm" action="register.php" method="POST">
                <h2>Sign Up Here</h2>
                <!--       sign up username-->

                <p>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                    <?php echo $account->getError(Constants:: $usernameToLong); ?>
                    <?php echo $account->getError(Constants:: $usernameToShort); ?>
                    <label for="signUpUsername">Username:</label>
                    <input id="signUpUsername" name="signUpUsername" type="text" placeholder="walkerDestroyer"
                           value="<?php getFormInputVal('signUpUsername') ?>" required>
                </p>
                <!--       first name-->

                <p>
                    <?php echo $account->getError(Constants:: $firstNameToLong); ?>
                    <?php echo $account->getError(Constants:: $firstNameToShort); ?>
                    <label for="firstName">First Name:</label>
                    <input id="firstName" name="firstName" type="text" placeholder="Daryl"
                           value="<?php getFormInputVal('firstName') ?>" required>
                </p>
                <!--       last name-->

                <p>
                    <?php echo $account->getError(Constants:: $lastNameToLong); ?>
                    <?php echo $account->getError(Constants:: $lastNameToShort); ?>
                    <label for="lastName">Last Name:</label>
                    <input id="lastName" name="lastName" type="text" placeholder="Dixon"
                           value="<?php getFormInputVal('lastName') ?>" required>
                </p>
                <!--        email address-->

                <p>
                    <?php echo $account->getError(Constants:: $emailTaken); ?>
                    <?php echo $account->getError(Constants:: $emailDoNotMatch); ?>
                    <?php echo $account->getError(Constants:: $emailWrongFormat); ?>
                    <label for="email">Email:</label>
                    <input id="email" name="email" type="email" placeholder="Your Email"
                           value="<?php getFormInputVal('email') ?>" required>
                </p>
                <!--email address confirmation -->
                <p>
                    <label for="emailConfirm">Confirm Email:</label>
                    <input id="emailConfirm" name="emailConfirm" type="email" placeholder="Your Email"
                           value="<?php getFormInputVal('emailConfirm') ?>" required>
                </p>

                <!--        password-->


                <p>
                    <?php echo $account->getError(Constants:: $passDoNotMatch); ?>
                    <?php echo $account->getError(Constants:: $passNotNumAndLetters); ?>
                    <?php echo $account->getError(Constants:: $passToLong); ?>
                    <?php echo $account->getError(Constants:: $passToShort); ?>
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

                <div class="haveAccountText">
                    <span id="hideReg">Have an account? Log in</span>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>

