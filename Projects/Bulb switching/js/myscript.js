'use strict';

//target the image with id lightbulb
var light = document.getElementById("lightbulb");
//add an event listener to the image (executing the bulbSwitch function)
light.addEventListener('click', bulbSwitch);

//This function will switch the light bulb picture
function bulbSwitch() {
    //target the image with id lightbulb
    var bulb = document.getElementById("lightbulb");
    //changing the src to the other image
    if(bulb.src.match("img/bulb-on.jpg")) {
        bulb.src = "img/bulb-off.jpg";
    
    } else {
        bulb.src = "img/bulb-on.jpg";
    }
}





























