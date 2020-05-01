var mySound;
var min_Sound;


(function() {
  console.log('init sound.js');
  mySound = document.getElementById('sound_player');
  min_Sound = document.getElementById('min_sound_player');

  // setTimeout(configSound, 1500);
  // setTimeout(playMainSound, 6000);
})();


function configSound() {

    var sounded = document.getElementsByClassName("sounded");
    for (var i = 0; i < sounded.length; i++) {
        sounded[i].addEventListener("mouseover", playMinSound);
    }

    document.getElementById('mute').style.display = "none";
    document.getElementById('mute_unmute').addEventListener('click', toggleMute, false);
}

function toggleMute(e) {
    if (mySound.muted) {
        mySound.muted = false;
        min_Sound.muted = false;
        document.getElementById('unmute').style.display = "block";
        document.getElementById('mute').style.display = "none";
    } else {
        mySound.muted = true;
        min_Sound.muted = true;
        document.getElementById('unmute').style.display = "none";
        document.getElementById('mute').style.display = "block";
    }
}

function playMainSound() {

    mySound.autoplay = false;
    mySound.loop = false;
    mySound.volume = 0.1;
    mySound.src = "/assets/media/ost.mp3";
    mySound.play();

}

function playMinSound() {

    min_Sound.autoplay = false;
    min_Sound.loop = false;
    min_Sound.volume = 0.5;
    min_Sound.src = "/assets/media/blip1.mp3";
    min_Sound.play();
}

function randomNumberFromRange(min, max) {
    var randomNumber = Math.floor(Math.random() * (max - min + 1) + min);
    return (randomNumber);
}
