<?php include("include/header.php");

if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    header("Location:index.php");
}
//SQL查詢 album
$sql_album = "SELECT * FROM albums WHERE id='$albumId'";
$albumQuery =  mysqli_query($conn, $sql_album);
$album = mysqli_fetch_array($albumQuery);
//mysqli_fetch_row:只能返回一個一位數組，只能通過下標來顯示,$row[0];
//mysqli_fetch_array:不只可以返回一個一維數組，還可以返回鍵值對的方式；
//關聯式查詢
$artistId = $album['artist'];

$sql_artist = "SELECT * FROM artists WHERE id='$artistId'";
$artistQuery = mysqli_query($conn, $sql_artist);
$artist = mysqli_fetch_array($artistQuery);

echo $album['title'] . "<br>";

echo $artist['name'];
?>





<?php include("include/footer.php"); ?>


