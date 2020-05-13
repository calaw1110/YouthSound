var currentPlaylist =[];
var audioElement;

function Audio(){

    this.currentlyPlaying;
    this.audio=document.createElement('audio');//build a audio tag

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
    this.setAttribute=function(){
        this.audio.setAttribute('crossorigin', 'anonymous');
    }
}
