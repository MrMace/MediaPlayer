var currentPlayList = [];
var shufflePlayList = [];
var tempPlayList = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var userLoggedIn;
var timer;

$(window).scroll(function () {
    hideOptionMenu();
});

function logout() {
    $.post("includes/handlers/ajax/logout.php");
    location.reload();
}

$(document).click(function (click) {
    var target = $(click.target);

    if (!target.hasClass("item") && !target.hasClass("optionsBtn")) {
        hideOptionMenu();
    }
});


// $(document).mouseout(function(select){
//     var target = $(select.target);
//
//     if(!target.hasClass("item") && !target.hasClass("optionsBtn")){
//         hideOptionMenu();
//     }
// });

$(document).on("change", "select.playlist", function () {
    var select = $(this);
    var plsId = select.val();
    var trackId = select.prev(".trackId").val();

    console.log("playlistId " + plsId);
    console.log("trackId " + trackId);
    $.post("includes/handlers/ajax/addPlaylist.php", {plsId: plsId, trackId: trackId}).done(function () {
        hideOptionMenu();
        select.val("");
    })
});

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
    var extraZero = (seconds < 10) ? "0" : "";

    return mins + ":" + extraZero + seconds;
}

function createPlaylist() {

    var popUp = prompt("Enter the name of your new playlist.");

    if (popUp != null) {
        $.post("includes/handlers/ajax/createPlaylist.php", {name: popUp, username: userLoggedIn}).done(function () {

            // if(error != ""){
            //     alert(error);
            //     return;
            // }
            pageOpen("myMusic.php");
        });
    }
}

function removeTrackFromPlaylist(button, plsId) {
    var trackId = $(button).prevAll(".trackId").val();

    $.post("includes/handlers/ajax/removeFromPlaylist.php", {plsId: plsId, trackId: trackId}).done(function () {

        // if(error != ""){
        //     alert(error);
        //     return;
        // }
        pageOpen("playlist.php?id=" + plsId);
    });
}

function deletePlaylist(plsId) {

    var prompt = confirm("Are you sure you want to delete this playlist?");

    if (prompt) {
        $.post("includes/handlers/ajax/deletePlaylist.php", {plsId: plsId}).done(function () {

            // if(error != ""){
            //     alert(error);
            //     return;
            // }
            pageOpen("myMusic.php");
        });
    }

}


function pageOpen(url) {

    if (timer !== null) {
        clearTimeout(timer);
    }

    if (url.indexOf("?") == -1) {
        url = url + "?";
    }
    var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
    $("#mainContent").load(encodedUrl);
    //scrolls top
    $("body").scrollTop(0);
    // places url in addressbar
    history.pushState(null, null, url);
}

function playFirstTrack() {

    setTrack(tempPlayList[0], tempPlayList, true);
}

function updateProgressBar(audio) {
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

    var progress = audio.currentTime / audio.duration * 100;
    $(".playbackBar .progress").css("width", progress + "%");

}

function updateVolBar(audio) {
    var volume = audio.volume * 100;
    $(".volBar .progress").css("width", volume + "%");
}


function Audio() {
    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener("ended", function () {
        nextSong();
    });

    this.audio.addEventListener("canplay", function () {
        //refers to obj event called on.
        var duration = formatTime(this.duration);
        $(".progressTime.remaining").text(duration);
    });

    this.audio.addEventListener("timeupdate", function () {
        if (this.duration) {
            updateProgressBar(this);
        }

    });

    this.audio.addEventListener("volumechange", function () {
        updateVolBar(this);
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

    this.setTime = function (seconds) {
        //current time num seconds passed in.
        this.audio.currentTime = seconds;
    }
}

function showOptionMenu(button) {
    var trackId = $(button).prevAll(".trackId").val();
    var menu = $(".optionMenu");
    var menuWidth = menu.width();
    menu.find(".trackId").val(trackId);
//from top window
    var scrollTop = $(window).scrollTop();
// disance from top doc
    var elementOffSet = $(button).offset().top;

    var top = elementOffSet - scrollTop;
    var left = $(button).position().left;
    menu.css({"top": top + "px", "left": left - menuWidth + "px", "display": "inline"});

}

function hideOptionMenu() {
    var menu = $(".optionMenu");
    if (menu.css("display") != "none") {
        menu.css("display", "none");
    }

}

function updateEmail(emailClass) {
    var emailVal = $("." + emailClass).val();
    $.post("includes/handlers/ajax/updateEmail.php", {
        email: emailVal,
        username: userLoggedIn
    }).done(function (response) {
        $("." + emailClass).nextAll(".message").text(response);
    })
}


function updatePass(currentPassClass, newPassClass, confirmPassClass) {
    var currentPass = $("." + currentPassClass).val();
    var newPass = $("." + newPassClass).val();
    var confirmPass = $("." + confirmPassClass).val();

    $.post("includes/handlers/ajax/updatePass.php", {
        currentPass: currentPass,
        newPass: newPass,
        confirmPass: confirmPass,
        username: userLoggedIn
    }).done(function (response) {
        $("." + currentPassClass).nextAll(".message").text(response);
    })
}