
var cont = 0;
var aud = document.getElementById("myAudio");
aud.onended = function () {
    if (cont == 0) {
        document.getElementById("popup-shows").style.display = "inherit";
        document.getElementById("resultmgs").innerHTML = "You have not selected any images.";
        document.getElementById("resultmgs").style.color = "#ff9966";
        cont = 1;
    }


};

// Audio play after click on the image 
var audio = document.getElementById('myAudio');
var count = 0;
document.querySelector('.audio-img').onclick = function () {

    if (count == 0) {
        count = 1;
        audio.play();


    } else {
        count = 0;
        audio.pause();


    }
}





