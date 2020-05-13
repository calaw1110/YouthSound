var currentPlaylist =[];
var audioElement;
//將傳入的時間 轉換格式
function formatTime(seconds){
    var time = Math.round(seconds);
    var minites= Math.floor(time/60);
    var seconds = time-(minites*60);
    var extraZero;
    if(seconds <10 ){
        extraZero="0";
    }else{
        extraZero="";
    }
    return minites+":"+extraZero+seconds;
}
function Audio(){

    this.currentlyPlaying;
    this.audio=document.createElement('audio');//build a audio tag
//監聽是否可以撥放->可以就觸發匿名函示
this.audio.addEventListener("canplay",function(){
    //改變文字
$(".progressTime.remaining").text(formatTime(this.duration));
});

    //音樂路徑
    this.setTrack= function(track){
        //取得 "現在"歌曲資訊
        //call nowPlayingBarContainer 的 setTrack  ajax 的回傳值
        this.currentlyPlaying=track;
        //連結同步
        this.audio.src=track.src;
    }
    this.play=function(){
        this.audio.play();
    }
    this.pause= function(){
        this.audio.pause();
    }
    // this.setAttribute=function(){
    //     this.audio.setAttribute('crossorigin', 'anonymous');
    // }
}
