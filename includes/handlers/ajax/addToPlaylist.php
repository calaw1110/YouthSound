<?php
include "../../config.php";
if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
    $playlistId = $_POST['playlistId'];
    $songId = $_POST['songId'];
    $findQuery = mysqli_query($conn, "SELECT * FROM playlistsongs WHERE playlistId='$playlistId' AND songId='$songId'");
    $row = mysqli_num_rows($findQuery);
    if ($row != 0) {
        echo "請勿重複加入歌單";
    } else { //SQL MAX()找到最大值
        $orderIdQuery = mysqli_query($conn, "SELECT  IFNULL( MAX(playlistOrder) + 1,1) AS playlistOrder FROM playlistsongs  WHERE playlistId='$playlistId'");
        $row = mysqli_fetch_array($orderIdQuery);
        $order = $row['playlistOrder'];
        $query = mysqli_query($conn, "INSERT INTO playlistsongs(songId,playlistId,playlistOrder) VALUES($songId,$playlistId,$order)");
    }
} else {
    echo "加入歌單失敗";
}
