<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/4/2018
 * Time: 4:11 PM
 */

class Artist
{
    private $connection;
    private $id;

    public function __construct($connection, $id)
    {
        $this->connection = $connection;
        $this->id = $id;


    }

    public function getName()
    {

        $queryArtist = mysqli_query($this->connection, "SELECT name FROM artist WHERE id='$this->id'");
        $artist = mysqli_fetch_array($queryArtist);
        return $artist['name'];
    }

}


?>