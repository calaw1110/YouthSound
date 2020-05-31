<?php
include "../../config.php";
if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];
    //SQL MAX()找到最大值
    $orderIdQuery = mysqli_query($conn, "SELECT MAX(playlistOrder)+1 FROM playlsitSongs='$playlistId'");
    $row = mysqli_fetch_array($orderIdQuery);
    $order = $row['playlistOrder'];
    $query = mysqli_query($conn, "INSERT INTO playlistSongs('songId','playlistId','order') VALUES($songId,$playlistId,$order)");
} else {
    echo "加入歌單失敗";
}
