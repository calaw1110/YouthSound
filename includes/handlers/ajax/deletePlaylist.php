<?php
include "../../config.php";

if (isset($_POST['playlistId'])) {
    $playlistId = $_POST['playlistId'];
    $deletePlaylistsQuery = mysqli_query($conn,
        "DELETE FROM playlists WHERE id='$playlistId'"
    );
    $deletePlaylistSongsQuery = mysqli_query($conn,
        "DELETE FROM playlistsongs WHERE playlistid='$playlistId'"
    );
} else {
    echo "刪除失敗";
}
