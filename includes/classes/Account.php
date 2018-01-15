<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 1/14/2018
 * Time: 6:05 PM
 */

class Account
{

    private $errorArray;

    public function __construct() {

        $this->errorArray = array();


    }

    public function register($userN, $firstN, $lastN, $em, $emC, $pass, $passC)
    {

        //called validations
        $this->usernameValidation($userN);
        $this->firstNameValidation($firstN);
        $this->lastNameValidation($lastN);
        $this->emailValidation($em, $emC);
        $this->passwordValidation($pass, $passC);

        if (empty($this->errorArray) == true) {
            //stuff goes to database
            return true;
        } else {
            return false;
        }

    }

    public function getError($error) {

        if (!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    private function usernameValidation($userN) {

        //check length
        if (strlen($userN) > 20) {
            array_push($this->errorArray, "Your username is to long, please keep it under 20 characters.");
            return;
        } if (strlen($userN) < 5) {
            array_push($this->errorArray, "Your username is to short, please use more than 5 characters.");
            return;
        }

        // Need to create username check if already exsists.---------------------------------------------------------------------------------------

    }

    private function firstNameValidation($firstN)
    {
        //Checks length
        if (strlen($firstN) > 50) {
            array_push($this->errorArray, "Your first name is to long, please keep it under 50 characters.");
            return;
        } if (strlen($firstN) < 2) {

            array_push($this->errorArray, "Your first name is to short, please use more than 2 characters.");
            return;
        }

    }

    private function lastNameValidation($lastN)
    {
        //Cehcks length
        if (strlen($lastN) > 50) {
            array_push($this->errorArray, "Your last name is to long, please keep it under 50 characters.");
            return;
        } if (strlen($lastN) < 2) {

            array_push($this->errorArray, "Your last name is to short, please use more than 2 characters.");
            return;
        }

    }

    private function emailValidation($em, $emC)
    {
        //checks if emails match
        if ($em != $emC) {
            array_push($this->errorArray, "Your emails do not match!");
            return;
        }
        //Verifies in correct format EMAIL
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, "Your email is not in the correct format! Please use correct format e.g. example@website.com");
            return;

        }

        // Need to create user check if already exsists.----------------------------------------------------------------------------------------------

    }

    private function passwordValidation($pass, $passC)
    {

        //validates that passwords match
        if ($pass != $passC) {
            array_push($this->errorArray, "Your passwords do not match!");
            return;
        }

        //checks to make sure password only contains numbers and letters
        if (preg_match('/[^A-Za-z0-9]/', $pass)) {
            array_push($this->errorArray, "Your password must only contain numbers and letters.");
            return;
        }

        //Cehcks length
        if (strlen($pass) > 50) {
            array_push($this->errorArray, "Please make your password less than 50 characters");
            return;
        } if (strlen($pass) < 5) {
            array_push($this->errorArray, "Please make your password longer than 6 characters");
            return;
        }

    }

}


?>