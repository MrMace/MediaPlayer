<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 1/14/2018
 * Time: 6:05 PM
 */

class Account {

    public function __construct()  {


    }

    public function register() {

        //called validations
        $this -> usernameValidation($username);
        $this -> firstNameValidation($firstName);
        $this -> lastNameValidation($lastName);
        $this -> emailValidation($email, $emailConfirm);
        $this -> passwordValidation($password, $passwordConfirm);

    }

    private function usernameValidation($userN){


    }

   private function firstNameValidation ($firstN){


    }

   private function lastNameValidation ($lastN){


    }

    private function emailValidation ($em, $emC){


    }

   private function passwordValidation ($passW, $passW2){


    }

}





?>