var currentPlayList = [];
var audioElement;
var mouseDown = false;

function formatTime(seconds) {
    var time = Math.round(seconds);
    //rounds down
    var mins = Math.floor(time / 60);
    var seconds = time - (mins * 60);

    // var extraZero;
    // if(seconds < 10) {
    //     extraZero = "0";
    // }else {
    //     extraZero = "";
    // }

    // conditional staement
    var extraZero = (seconds<10)? "0" : "";

    return mins + ":" + extraZero + seconds;
}

function updateProgressBar(audio){
$(".progressTime.current").text(formatTime(audio.currentTime));
$(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime))

    var progress = audio.currentTime / audio.duration * 100;
$(".playbackBar .progress").css("width", progress + "%");

}

function updateVolBar(audio){
    var volume = audio.volume * 100;
    $(".volBar .progress").css("width", volume + "%");
}


function Audio() {
    this.currentPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener("canplay", function () {
        //refers to obj event called on.
        var duration = formatTime(this.duration);
        $(".progressTime.remaining").text(duration);
    });

    this.audio.addEventListener("timeupdate", function (){
        if(this.duration) {
            updateProgressBar(this);
        }

    });

    this.audio.addEventListener("volumechange", function(){
        updateVolBar(this);
    })

    this.setTrack = function (track) {
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    };

    this.play = function () {
        this.audio.play();
    };

    this.pause = function () {
        this.audio.pause();
    };
    
    this.setTime = function (seconds) {
        //current time num seconds passed in.
        this.audio.currentTime = seconds;
    }
}