<?php

class Constants {

//    error handling registeration
    public static $passDoNotMatch = "Your passwords do not match!";
    public static $passNotNumAndLetters = "Your password must only contain numbers and letters.";
    public static $passToLong = "Please make your password less than 50 characters";
    public static $passToShort = "Please make your password longer than 6 characters";
    public static $emailDoNotMatch = "Your emails do not match!";
    public static $emailWrongFormat = "Your email is not in the correct format! Please use correct format e.g. example@website.com";
    public static $lastNameToLong = "Your last name is to long, please keep it under 50 characters.";
    public static $lastNameToShort = "Your last name is to short, please use more than 2 characters.";
    public static $firstNameToLong = "Your first name is to long, please keep it under 50 characters.";
    public static $firstNameToShort = "Your first name is to short, please use more than 2 characters.";
    public static $usernameToLong = "Your username is to long, please keep it under 20 characters.";
    public static $usernameToShort = "Your username is to short, please use more than 5 characters.";
    public static $usernameTaken = "This username already exists";
    public static $emailTaken = "This email already exists";

    public static $loginFailed = "Username and password do not match!";


}


?>