<?php
// 判斷是否有用AJAX請求
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    include("include/config.php");
    //要先include Artist class 才能 include Album class
    include("include/classes/Artist.php"); //1
    include("include/classes/Album.php"); //2
    include("include/classes/Song.php"); //3
} else {
    include("include/header.php");
    include("include/footer.php");
    $url = $_SERVER['REQUEST_URI'];
    echo "<script>openPage('$url')</script>";
    exit();
}
