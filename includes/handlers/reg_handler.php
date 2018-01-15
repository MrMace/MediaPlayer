<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 1/14/2018
 * Time: 5:44 PM
 */



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

   $wasSuccessful =  $account -> register($username, $firstName, $lastName, $email, $emailConfirm, $password, $passwordConfirm);

    if($wasSuccessful == true) {
        header("Location: index.php");
    }

}




?>
