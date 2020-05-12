<?php
include "../../config.php";
if (isset($_POST['songId'])) {
    $songId = $_POST['songId'];
    //播放次數計數器
    $query = mysqli_query($conn, "UPDATE songs SET plays =plays + 1 WHERE id='$songId'");
}
