//setInterval keeps the clock running as long as the browser is open
//It will call the function every second until the browser is closed
setInterval(function(){
    //create a new Date object that include date and time
    var currentTime = new Date();
    var hours = currentTime.getHours(); //getting the hours
    var minutes = currentTime.getMinutes(); //getting the minutes
    var seconds = currentTime.getSeconds(); //getting the seconds
    var period = "AM";

    //determining AM and PM and set the time in 12 hours scale
    if(hours >= 12){
        period = "PM";
    }
    if(hours > 12){
        hours -= 12;
    }
    //making the clock more beautiful
    if(seconds < 10){
        seconds = "0" + seconds;
    }
    if(minutes < 10){
        minutes = "0" + minutes;
    }
    if(hours < 10){
        hours = "0" + hours;
    }

    var clockTime = hours + ":" + minutes + ":" + seconds + " " + period;
    var clock = document.getElementById('clock'); //target the div tag with id=clock
    clock.innerText = clockTime;


}, 1000);