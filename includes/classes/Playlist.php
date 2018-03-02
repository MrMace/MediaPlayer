<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 3/2/2018
 * Time: 1:50 PM
 */
?>

<?php

class Playlist
{
    private $connection;
    private $errorArray;
    private $id;

    public function __construct($connection, $id)
    {
        $this->connection = $connection;
        $this->errorArray = array();
        $this->id = $id;

    }

    public function getName(){
        return $this->id;
    }

}














?>
