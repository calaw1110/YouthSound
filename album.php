<?php include("include/header.php");

if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    header("Location:index.php");
}
$album = new Album($conn, $albumId);
$artist = $album->getAlbumArtist(); //回傳Album實作化
?>
<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getAlbumArtworkPath() ?>" alt=""></div>
    <div class="rightSection">
        <h2><?php echo $album->getAlbumTitle(); ?></h2>
        <p>By <?php echo $artist->getArtistName(); ?></p>
        <p><?php echo "總共有  " . $album->getNumberOfSongs() . "  首" ?></p>
    </div>
</div>

<div class="tracklistContainer">
    <ul class="tracklist">
        <?php
        $songIdArray = $album->getSongIds();
        $i = 1;
        foreach ($songIdArray as $songId) {
            $albumSong = new Song($conn, $songId);
            $albumArtist = $albumSong->getSongArtistId();
            echo "<li class='tracklistRow'>
                            <div class='trackCount'>
                                <img class='play' src='assets/images/icons/play-white.png'>
                                <span class='trackNumber'>$i</span>
                            </div>
                            <div class='trackInfo'>
                                <span class='trackName'>" . $albumSong->getSongTitle() . " </span>
                                <span class='artisName'>" . $albumArtist->getArtistName() . "</span>
                            </div>
                            <div class='trackOptions'>
                                <img class='optionsBtn' src='assets/images/icons/more.png'>
                            </div>
                            <div class='trackDuration'>
                                <span class='duration'>" . $albumSong->getSongDuration() . "</span>
                            </div>

                    </li>";
            $i++;
        }

        ?>
    </ul>
</div>


<?php include("include/footer.php"); ?>
