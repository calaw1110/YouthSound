<?php
include "include/includeFiles.php";
if (isset($_GET['term'])) {
    //接搜尋字串內容
    //urldecode() 將傳入的網址解碼
    $term = urldecode($_GET['term']);
} else {
    //沒接到設為空值
    $term = "";
}
?>
<div class="searchContainer">
    <h4>搜尋 歌手、歌曲或專輯</h4>
    <input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="請輸入心中所想的那..." onfocus="this.value=this.value">
</div>
<script>
    $(".searchInput").focus();
    $(function() {
        var timer;
        // 觸發時刻     按下鍵盤   按下鍵盤   放開鍵盤
        // 觸發優先順序 keydown → keypress → keyup
        $('.searchInput').keyup(function() {
            clearTimeout(timer);

            timer = setTimeout(function() {
                //接input value
                var val = $(".searchInput").val();
                openPage("search.php?term=" + val);
                console.log(val);
            }, 500)
        })
    })
</script>


<div class="tracklistContainer borderBottom">
    <h2>Songs</h2>
    <ul class="tracklist">
        <?php
        $songsQuery = mysqli_query($conn, "SELECT id FROM songs WHERE title LIKE '%$term%' LIMIT 10");

        if (mysqli_num_rows($songsQuery) == 0) {
            echo "<span class='noResults'>找不到歌曲跟  " . $term . "  符合</span>";
        }


        $songIdArray = array();
        $i = 1;
        while ($row = mysqli_fetch_array($songsQuery)) {
            if ($i > 15) break;

            array_push($songIdArray, $row['id']);


            $albumSong = new Song($conn,  $row['id']);
            $albumArtist = $albumSong->getSongArtistId();
            echo "<li class='tracklistRow'>
                            <div class='trackCount'>
                                <img class='play' src='assets/images/icons/play-white.png'
                                onclick='setTrack(\"" . $albumSong->getSongId() . "\",tempPlaylist,true)'>
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
        <script>
            //將songIdArray 回傳時使用json格式 並儲存在tempSongIds 裡面 -> 這張專輯所有的歌的ID
            var tempSongIds = '<?php echo json_encode($songIdArray)  ?>'
            // 將tempSongIds 內容轉成對應的物件型式
            tempPlaylist = JSON.parse(tempSongIds);
        </script>
    </ul>
</div>
