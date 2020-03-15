'use strict';
//endtime returns the ending time in seconds
function getTimeRemaining(endtime) {
    //Date.parse() converts a date into the number of milliseconds
    //Date.parse(new Date()) is the number of milliseconds since January first 1970
    var t = Date.parse(endtime) - Date.parse(new Date());
    // getting the time in seconds
    var seconds = Math.floor((t / 1000) % 60);
    // var milliseconds = seconds / 1000;
    // getting the time in minutes
    var minutes = Math.floor((t / 1000 / 60) % 60);
    // getting the time in hours
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    // getting the time in days
    var days = Math.floor(t / (1000 * 60 * 60 * 24));

    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
        // 'milliseconds' : milliseconds
    };
}

// This function will show the inputs to the user
function showForm() {

    let html = `
    <form id="set-time">
    <input type="text" name="day" id="day" placeholder="day">
    <input type="text" name="hour" id="hour" placeholder="hour">
    <input type="text" name="minute" id="minute" placeholder="minute">
    <input type="text" name="second" id="second" placeholder="second">
    </form>
    <br />
    <button id="btn" class="waves-effect waves-light 
    btn-large #b71c1c red darken-4"><strong>Set Time</strong></button>
    `;
    document.getElementById('settings').innerHTML = html;
}



// This function is used to initialize the clock
function initializeClock(id, endtime) {
    //querySelector Returns the first element that is a 
    //descendant of node that matches selectors.
    var clock = document.getElementById(id);
    var daysSpan = clock.querySelector('.days'); //target the div tag with class .days
    var hoursSpan = clock.querySelector('.hours'); //target the div tag with class .hours
    var minutesSpan = clock.querySelector('.minutes'); //target the div tag with class .minutes
    var secondsSpan = clock.querySelector('.seconds'); //target the div tag with class .seconds

    // var millisecondsSpan = clock.querySelector('.milliseconds');

    function updateClock() {
        //calling the getTimeRemaining() method
        var t = getTimeRemaining(endtime);

        //putting the days in the div tag with class .days
        daysSpan.innerHTML = t.days;
        // -2 is used to indicate the first of a string
        if (t.days < 10) { //if it is less than 10 we add a zero 
            daysSpan.innerHTML = ('0' + t.days).slice(-2);
        }
        //putting the hours in the div tag with class .hours
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        //putting the minutes in the div tag with class .minutes
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        //putting the seconds in the div tag with class .seconds
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        // millisecondsSpan.innerHTML = ('0' + t.milliseconds).slice(-2);

        //if we reach to zero, then we stop calling the function
        if (t.total <= 0) {
            clearInterval(timeInterval);
            //getting the song
            var audio = new Audio('sound.mp3');
            audio.play() //playing the song 
        }
    }

    updateClock();
    //call the updateClock() function every second
    var timeInterval = setInterval(updateClock, 1000);
}

// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
//calling the showForm() function
showForm();

// This function will get the information about time from the user
document.getElementById("btn").onclick = function getDataFromUser() {
    let daytime, hourTime, minuteTime, secondTime;
    daytime = $("#day").val(); //getting the daytime
    hourTime = $("#hour").val(); //getting the hourTime
    minuteTime = $("#minute").val(); //getting the minuteTime
    secondTime = $("#second").val(); //getting the secondTime

    // If all the inputs from the user are valid (no need for strict conversion as the inputs are strings)
    if (daytime == parseInt(daytime, 10) && hourTime == parseInt(hourTime, 10) &&
        minuteTime == parseInt(minuteTime, 10) && secondTime == parseInt(secondTime, 10)) {
        //start the clock
        clockStart(daytime, hourTime, minuteTime, secondTime);
    }

    else { // if any of the user inputs were invalid (not an integer) show some error message
        showAlert("The inputs are not valid!");
    }


}



function clockStart(daytime, hourTime, minuteTime, secondTime) {
    //millisecondsTime from January first 1970
    var millisecondsTime = Date.parse(new Date());
    //daytime in milliseconds
    var millisecondsDay = daytime * 24 * 60 * 60 * 1000;
    //hourTime in milliseconds
    var millisecondsHour = hourTime * 60 * 60 * 1000;
    //minuteTime in milliseconds
    var millisecondsMinute = minuteTime * 60 * 1000;
    //secondTime in milliseconds
    var millisecondsSecond = secondTime * 1000;

    //setting the deadline
    var deadline = new Date(millisecondsTime + millisecondsDay +
        millisecondsHour + millisecondsMinute + millisecondsSecond);
    //hide the div tag containing the input boxes
    $(document).find("#settings").hide();
    //show the div tag containing the countdown clock
    $(document).find("#clockDiv").show();
    //initialize the clock with the deadline
    initializeClock('clockDiv', deadline);
}

//This function will show an alert when something is wrong 
function showAlert(message) {
    // target the div tag with id='demo'
    const div = document.getElementById("demo");
    div.innerHTML = message;
    div.style.background = "#eeff41";
    div.style.display = "block";
    // Time out
    setTimeout(() => {
        //remove the alert after 3 seconds
        div.style.display = "none";
    }, 2000);
}

























