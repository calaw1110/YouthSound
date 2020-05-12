var currentPlaylist =[];
var audioElement;

function Audio(){
    this.currentlyPlaying;
    this.audio = document.createElement('audio');//build a audio tag

    this.setTrack= function(src){
        this.audio.src=src;
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
