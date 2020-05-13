<?php
$songQuery = mysqli_query($conn, "SELECT * FROM songs ORDER BY RAND() LIMIT 10");
$resultArray = array(); //create array
while ($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}
$jsonArray = json_encode($resultArray);
?>

<script>
    $(function() {
        currentPlaylist = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        audioElement.setAttribute();

        setTrack(currentPlaylist[0], currentPlaylist, false);
    })

    //取得播放清單  賦予 撥放器功能
    function setTrack(trackId, newPlaylist, play) {

        //取得音檔位置來播放
        // audioElement.setTrack("");
        // $.post("URL ",{songId : trackId}, function(data){ } );
        $.post("include/handler/ajax/getSongJson.php", {
            songId: trackId
        }, function(data) {
            // JSON.parse 將傳進來的json格式資料轉換成js 物件形式
            var track = JSON.parse(data);
            console.log(track);
            //取得歌曲名稱
            $(".trackName span").text(track.title);

            //ajax取得演唱者名稱
            $.post("include/handler/ajax/getArtistJson.php", {
                artistId: track.artist
            }, function(data) {
                //轉JSON格式
                var artist = JSON.parse(data);
                //check data
                console.log(artist);
                //將歌手名字傳進撥放器
                $(".artisName span").text(artist.name)
            });

            //取得專輯資訊
            $.post("include/handler/ajax/getAlbumJson.php", {
                albumId: track.album
            }, function(data) {
                //將專輯資訊轉換成JSON格式
                var album = JSON.parse(data);
                //check data
                console.log(album);
                //將專輯圖片傳入撥放器
                $(".albumLink img").attr("src", album.artworkPath);
            });
            audioElement.setTrack(track);
            playSong();
        });

        if (play == true) {
            audioElement.play();
        }
    }

    function playSong() {

        //呼叫撥放計數器
        if (audioElement.audio.currentTime == 0) {
            $.post("include/handler/ajax/updatePlay.php", {
                songId: audioElement.currentlyPlaying.id
            });
        }

        $(".controlBtn.play").hide();
        $(".controlBtn.pause").show();
        audioElement.play();
    }

    function pauseSong() {
        $(".controlBtn.pause").hide();
        $(".controlBtn.play").show();
        audioElement.pause();
    }
    //取得撥放器目前音量



    //撥放器靜音
    function mutedSong() {
        $(".controlBtn.volume > #no_muted").hide();
        $(".controlBtn.volume > #muted").show();
        //將撥放器音量設為0
        audioElement.audio.volume = false;
    }
    // 取消播器靜音
    function no_mutedSong() {
        $(".controlBtn.volume > #muted").hide();
        $(".controlBtn.volume > #no_muted").show();
        //將撥放器音量設為1  = 100%
        audioElement.audio.volume = true;
    }
</script>
<div id="nowPlayingBarContainer">
    <!-- 音樂撥放器 -->
    <div id="nowPlayingBar">
        <!-- 左區塊 放專輯圖片 歌名跟演唱者 -->
        <div id="nowPlayingLeft">
            <div class="content">
                <!-- 專輯圖片 -->
                <span class="albumLink"><img src="" alt="" /></span>

                <!-- 歌名 -->
                <div class="trackInfo">
                    <span class="trackName">
                        <!-- name of song -->
                        <span></span>
                    </span>
                    <!-- 演唱者 -->
                    <span class="artisName">
                        <span></span>
                    </span>
                </div>
            </div>
        </div>
        <div id="nowPlayingCenter">
            <!-- 面板控制項 -->
            <div class="content playerControls">
                <div class="buttons">
                    <!-- 控制面板的按鈕 -->
                    <button class="controlBtn shuffle" title="Shuffle button">
                        <img src="assets/images/icons/shuffle.png" alt="ShuffleBtn" />
                    </button>
                    <button class="controlBtn previous" title="Previous button">
                        <img src="assets/images/icons/previous.png" alt="PreviousBtn" />
                    </button>
                    <button class="controlBtn play" title="Play button" onclick="playSong()">
                        <img src="assets/images/icons/play.png" alt="PlayBtn" />
                    </button>
                    <button class="controlBtn pause" title="Pause button" onclick="pauseSong()" style="display: none;">
                        <img src="assets/images/icons/pause.png" alt="PauseBtn" />
                    </button>
                    <button class="controlBtn next" title="Next button">
                        <img src="assets/images/icons/next.png" alt="NextBtn" />
                    </button>
                    <button class="controlBtn repeat" title="Repeat button">
                        <img src="assets/images/icons/repeat.png" alt="RepeatBtn" />
                    </button>
                </div>
                <!-- 撥放器時間軸 -->
                <div class="playbackBar">
                    <!-- 目前時間 -->
                    <span class="progressTime current">0.00</span>
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
                    <!-- 剩餘時間 -->
                    <span class="progressTime remaining">0.00</span>
                </div>
            </div>
        </div>
        <div id="nowPlayingRight">
            <div class="volumeBar">
                <button class="controlBtn volume" title="Volume Btn
        ">
                    <img src="assets/images/icons/volume.png" alt="VolumeBtn" id="no_muted" onclick="mutedSong();" />

                    <img src="assets/images/icons/volume-mute.png" alt="MutedBtn" id="muted" onclick="no_mutedSong()" style="display: none" />
                </button>
                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
