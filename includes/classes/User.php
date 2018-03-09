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
    public function getEmail(){
        $query= mysqli_query($this->connection, "SELECT email FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($query);
        return $row['email'];
    }

    public function getFAndLName(){
        $query= mysqli_query($this->connection, "SELECT concat(firstName, ' ', lastName) as 'name' FROM users WHERE username='$this->username'");
        $row = mysqli_fetch_array($query);
        return $row['name'];
    }

}


?>
