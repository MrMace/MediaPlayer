<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/4/2018
 * Time: 5:01 PM
 */


class Album
{
    private $connection;
    private $id;
    private $title;
    private $artistId;
    private $genre;
    private $ar;

    public function __construct($connection, $id)
    {
        $this->connection = $connection;
        $this->id = $id;


        $queryTitle = mysqli_query($this->connection, "SELECT * FROM albums WHERE id='$this->id'");
        $album = mysqli_fetch_array($queryTitle);

        $this->title = $album['title'];
        $this->artistId = $album['artist'];
        $this->genre = $album['genre'];
        $this->artwork = $album['art'];
    }

    public function getTitle()
    {

        return $this->title;

    }

    public function getArtist()
    {

        return new Artist($this->connection, $this->artistId);
    }

    public function getArtwork()
    {

        return $this->artwork;
    }

    public function getGenre()
    {

        return $this->genre;
    }

}


?>