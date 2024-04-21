let arrIcon = ["./assets/icon/sound_mute.png", "./assets/icon/sound_loud.png"];
let volume = ["0", "1"];

let indexButton = 0;

$(document).ready(function() {
    $("#mtbtn").attr("src", arrIcon[indexButton]);

    $("#mtbtn").click(function() {
        $("#bg-audio")[0].play();
        indexButton = 1 - indexButton; 

        $("#mtbtn").attr("src", arrIcon[indexButton]);
        $("#bg-audio").prop("volume", volume[indexButton]);
    });
});