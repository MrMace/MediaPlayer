<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Matt-->
<!-- * Date: 1/9/2018-->
<!-- */-->


<?php


//username sanitize
function sanitizeFormUsername($inputText)
{

    //makes sure cannot add elements and such to database.
    $inputText = strip_tags($inputText);
    // replaces spaces to to space
    $inputText = str_replace(" ", "", $inputText);
    //returns
    return $inputText;

}

//form string sanitize
function sanitizeStringForm($inputText)
{

    //makes sure cannot add elements and such to database.
    $inputText = strip_tags($inputText);
    // replaces spaces to no space
    $inputText = str_replace(" ", "", $inputText);
    //makes the first character uppercase and the rest lower
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;

}


//password sanitize
function sanitizePasswordForm($inputText)
{

    //makes sure cannot add elements and such to database.
    $inputText = strip_tags($inputText);
    //returns
    return $inputText;

}

//if login button is pressed
if (isset($_POST['loginBtn'])) {

}

//if registration button is pressed
if (isset($_POST['regBtn'])) {
    //stores the info for username
    $username = sanitizeFormUsername($_POST['signUpUsername']);

    //stores the input for first name
    $firstName = sanitizeStringForm($_POST['firstName']);

    //stores input for lastname
    $lastName = sanitizeStringForm($_POST['lastName']);

    //stores info for emal
    $email = sanitizeStringForm($_POST['email']);

    //email confirm stored info
    $emailConfirm = sanitizeStringForm($_POST['emailConfirm']);

    //password info
    $password = sanitizePasswordForm($_POST['password']);

    //password confirm stored info
    $passwordConfirm = sanitizePasswordForm($_POST['passwordConfirm']);


}

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
            <label for="signUpUsername">Username:</label>
            <input id="signUpUsername" name="signUpUsername" type="text" placeholder="walkerDestroyer" required>
        </p>
        <!--       first name-->
        <p>
            <label for="firstName">First Name:</label>
            <input id="firstName" name="firstName" type="text" placeholder="Daryl" required>
        </p>
        <!--       last name-->
        <p>
            <label for="lastName">Last Name:</label>
            <input id="lastName" name="lastName" type="text" placeholder="Dixon" required>
        </p>
        <!--        email address-->
        <p>
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

