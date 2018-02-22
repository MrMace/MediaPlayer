var currentPlayList = [];
var audioElement;

function formatTime(seconds) {
    var time = Math.round(seconds);
    //rounds down
    var mins = Math.floor(time / 60);
    var seconds = time - (mins * 60);

    return mins + ":" + seconds;
}
function Audio() {


    this.currentPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener("canplay", function () {
        //refers to obj event called on.
        var duration = formatTime(this.duration);
        $(".progressTime.remaining").text(duration);
    });

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
}