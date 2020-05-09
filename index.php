<?php
include "include/config.php";
//session_destroy();LOG OUT
//假如有登入狀態
if (isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
  header("Location: Account.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <link rel="stylesheet" href="assets/css/Index.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

  <title>YouthSound</title>
  <style></style>
</head>

<body>
  <div id="mainContainer">
    <div id="topContainer">
      <div id="navBarContainer">

      </div>
      <div></div>
    </div>

    <div id="nowPlayingBarContainer">
      <!-- 音樂撥放器 -->
      <div id="nowPlayingBar">
        <!-- 左區塊 放專輯圖片 歌名跟演唱者 -->
        <div id="nowPlayingLeft">
          <div class="content">
            <!-- 專輯圖片 -->
            <span class="albumLink"><img src="https://picsum.photos/800/800" alt="" /></span>

            <!-- 歌名 -->
            <div class="trackInfo">
              <span class="trackName">
                <!-- name of song -->
                <span>123</span>
              </span>
              <!-- 演唱者 -->
              <span class="artisName">
                <span>Abc Rdf</span>
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
              <button class="controlBtn play" title="Play button">
                <img src="assets/images/icons/play.png" alt="PlayBtn" />
              </button>
              <button class="controlBtn pause" title="Pause button" style="display: none;">
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
              <img src="assets/images/icons/volume.png" alt="VolumeBtn" />
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
  </div>


</body>

</html>
