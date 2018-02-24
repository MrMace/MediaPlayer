<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 2/10/2018
 * Time: 7:58 PM
 */

?>

<?php

class Song
{
    private $connection;
    private $id;
    private $mysqliData;
    private $albumId;
    private $artistId;
    private $genre;
    private $title;
    private $path;
    private $duration;

    public function __construct($connection, $id)
    {
        $this->connection = $connection;
        $this->id = $id;


        $query = mysqli_query($this->connection, "SELECT * FROM songs WHERE id='$this->id'");
        $this->mysqliData = mysqli_fetch_array($query);

        $this->title = $this->mysqliData['title'];
        $this->artistId = $this->mysqliData['artist'];
        $this->albumId = $this->mysqliData['album'];
        $this->genre = $this->mysqliData['genre'];
        $this->duration = $this->mysqliData['duration'];
        $this->path = $this->mysqliData['path'];

    }

    /**
     * @return mixed
     */

    public function getMysqliData()
    {
        return $this->mysqliData;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getArtist()
    {
        return new Artist($this->connection, $this->artistId);
    }

    public function getAlbum()
    {
        return new Album($this->connection, $this->albumId);
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getPath()
    {
        return $this->path;
    }


}


?>
