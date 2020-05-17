var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false; //呼滑鼠"按住"事件
var currentIndex = 0;
var repeat = false;
var shuffle = false;

//將傳入的時間 轉換格式
function formatTime(seconds) {
    //Math.round(seconds)  四捨五入   0.5 ->1  0.4->0
    var time = Math.round(seconds);
    //Math.floor(數字)   會回傳小於數字的最大整數 ex 5.5 -> 5   -5.5->-6
    var minites = Math.floor(time / 60);
    var seconds = time - (minites * 60);
    //秒數只有 個位 時，十位 補零
    var extraZero;
    if (seconds < 10) {
        extraZero = "0";
    } else {
        extraZero = "";
    }
    return minites + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio) {
    //更新目前播放秒數
    $(".progressTime.current").text(formatTime(audio.currentTime));

    //Version 1  顯示歌曲 "總" 秒數
    $(".progressTime.remaining").text(formatTime(audio.duration));
    //Version 2 顯示歌曲 "剩餘" 秒數
    // $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));
    //畫目前時間軸
    var progress = (audio.currentTime / audio.duration) * 100;
    $("#timeBar").css("width", progress + "%");
}

function updateVolumeProgressBar(audio) {
    var volume = audio.volume * 100;
    $(".volumeBar .progress").css("width", volume + "%");
}

function Audio() {

    this.currentlyPlaying;
    this.audio = document.createElement('audio'); //build a audio tag
    this.audio.addEventListener("ended",function(){
        //nowPlayingBarContainer.php  line 154
        nextSong();
    })

    //監聽是否可以撥放->可以就觸發匿名函示
    this.audio.addEventListener("canplay", function() {

        // 將歌曲時間轉成標準格式輸出
        var duration = formatTime(this.duration);
        //顯示歌曲時間長度
        $(".progressTime.remaining").text(duration);

    });
    //監聽時間改變
    this.audio.addEventListener("timeupdate", function() {
        //if have duration
        if (this.duration) {
            updateTimeProgressBar(this);
        }
    })
    //監聽音量改變
    this.audio.addEventListener("volumechange", function() {
        if (this.volume) {

            updateVolumeProgressBar(this);
        }
    })
    //音樂路徑
    this.setTrack = function(track) {
        //取得 "現在"歌曲資訊
        //call nowPlayingBarContainer 的 setTrack  ajax 的回傳值
        this.currentlyPlaying = track;
        //連結同步
        this.audio.src = track.src;
    }
    this.play = function() {
        this.audio.play();
    }
    this.pause = function() {
        this.audio.pause();
    }
    // this.setAttribute=function(){
    //     this.audio.setAttribute('crossorigin', 'anonymous');
    // }

    this.setTime = function(seconds) {
        this.audio.currentTime = seconds;
    }
}
