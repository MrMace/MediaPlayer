<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/2/2018
 * Time: 1:15 PM
 */

?>
<?php

class User
{
    private $connection;
    private $errorArray;
    private $username;

    public function __construct($connection, $username)
    {
        $this->connection = $connection;
        $this->errorArray = array();
        $this->username = $username;

    }

    public function getUsername(){
        return $this->username;
    }

}


?>
