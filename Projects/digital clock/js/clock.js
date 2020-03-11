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


// Determining the day
var day = new Date();
var weekday = new Array(7);
weekday[0] = "Sunday";
weekday[1] = "Monday";
weekday[2] = "Tuesday";
weekday[3] = "Wednesday";
weekday[4] = "Thursday";
weekday[5] = "Friday";
weekday[6] = "Saturday";

//some comments!
var date2 = new Date();
var weekday2 = new Array(7);
weekday2[0] = "Begin the Week!";
weekday2[1] = "Monday morning blues!";
weekday2[2] = "Taco Time!";
weekday2[3] = "Two more days to the weekend!";
weekday2[4] = "The weekend is almost is here...";
weekday2[5] = "Weekend is here.";
weekday2[6] = "Time to party!";


var n = weekday[day.getDay()];
var n2 = weekday2[date2.getDay()];

var displayWeekday = document.getElementById('weekday'); //target the strong with id weekday
var phrase = document.getElementById('phrase'); //target the i with id phrase


whatDayIsIt();

function whatDayIsIt(){
    displayWeekday.innerText = n;
    phrase.innerText = n2;
}