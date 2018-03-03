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
    private $playlistName;
    private $playlistOwner;

    public function __construct($connection, $data)
    {
        if(!is_array($data)){

            $query = mysqli_query($connection, "SELECT * FROM playlists WHERE id='$data'");
            $data = mysqli_fetch_array($query);
        }
        $this->connection = $connection;
        $this->errorArray = array();
        $this->id = $data['id'];
        $this->playlistName = $data['playlistName'];
        $this->playlistOwner = $data['playlistOwner'];

    }

    public function getId(){
        return $this->id;
    }
 public function getName(){
        return $this->playlistName;
    }
 public function getOwner(){
        return $this->playlistOwner;
    }

    public function getNumSongs() {
        $query = mysqli_query($this->connection, "SELECT plsSongId FROM playlistsongs WHERE plsId = '$this->id'");
        return mysqli_num_rows($query);
    }

    public function getSongIds()
    {

        $query = mysqli_query($this->connection, "SELECT plsSongId FROM playlistSongs WHERE plsId='$this->id' ORDER BY plsOrder ASC");
        $array = array();

        while ($row = mysqli_fetch_array($query)) {
            array_push($array, $row['plsSongId']);
        }

        return $array;
    }

}














?>
