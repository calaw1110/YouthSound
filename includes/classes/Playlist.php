<?php
class Playlist
{
    private $conn;
    private $id;
    private $name;
    private $owner;
    public function __construct($conn, $data)
    {
        //if $data is an id (string)
        if (!is_array($data)) {
            //用id去取得歌單資訊
            $DataQuery = mysqli_query($conn, "SELECT * FROM playlists WHERE id='$data'");
            //回傳資料陣列
            $data = mysqli_fetch_array($DataQuery);
        }
        $this->conn = $conn;
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->owner = $data['owner'];
    }
    public function getName()
    {
        return $this->name;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getOwner()
    {
        return $this->owner;
    }
    //取得歌單裡面有多少首歌曲
    public function getNumberOfSongs()
    {
        $query = mysqli_query($this->conn, "SELECT songId FROM playlistSongs WHERE playlistId ='$this->id'");
        return mysqli_num_rows($query);
    }
    public function getSongIds()
    {
        $query = mysqli_query($this->conn, "SELECT songId FROM playlistSongs
        WHERE playlistId='$this->id' ORDER BY playlistOrder ASC");
        $array = array();
        while ($row = mysqli_fetch_array($query)) {
            array_push($array, $row['songId']);
        }
        return $array;
    }
}