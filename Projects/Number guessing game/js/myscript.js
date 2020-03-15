'use strict';
//generate a random number between 1 and 100
var randomNumber = Math.floor(Math.random() * 100) + 1;
//target the div tag with class .guesses
var guesses = document.querySelector('.guesses');
//target the div tag with class .lastResult
var lastResult = document.querySelector('.lastResult');
//target the div tag with class .lowOrHi
var lowOrHi = document.querySelector('.lowOrHi');
//target the button tag with class .guessSubmit
var guessSubmit = document.querySelector('.guessSubmit');
//target the input tag with class .guessField
var guessField = document.querySelector('.guessField');
//initialize the guessCount with one
var guessCount = 1;
//target the button with id resetBtn 
var resetButton = document.getElementById('resetBtn');
//add an event listener to the resetButton (executing the resetGame function)
resetButton.addEventListener('click', resetGame);
//focus on the guessField
guessField.focus();

//This function will investigate the input value from the user
function checkGuess() {
    //get the user input
    var userGuess = Number(guessField.value);
    // If the input from the user is invalid (valid: integer and between 1 and 100)
    if (userGuess !== parseInt(userGuess, 10) || userGuess > 100 || userGuess < 1) {
        //show some alert   
        showAlert("Please write an integer between 1 and 100!");
        guessField.value = ''; //clean the guessField
        guessField.focus(); //focus on the guessField
    } else {
        //show the div tag with class .resultParas
        $('.resultParas').show();
        //if the number of guesses were 1
        if (guessCount === 1) {
            guesses.textContent = 'Previous Guesses: ';
        }
        //add an space
        guesses.textContent += userGuess + ' ';
        //set the background color
        guesses.style.backgroundColor = '#006064';

        //if the user wrote the right number
        if (userGuess === randomNumber) {
            //change the text of lastResult
            lastResult.textContent = 'Congratulations! You got it right';
            //set the background color
            lastResult.style.backgroundColor = '#388e3c';
            //clean the text of the div tag lowOrHi
            lowOrHi.textContent = '';
            //call the setGameOver() method
            setGameOver();

        } else if (guessCount === 10) { //if the user fails to guess the right number
            //change the text of lastResult
            lastResult.textContent = '!!!GAME OVER!!!';
            //clean the text of the div tag lowOrHi
            lowOrHi.textContent = '';
            //call the setGameOver() method
            setGameOver();

        } else { //if the user still has the opportunity to guess the right number
            lastResult.textContent = 'Wrong!';
            //set the background color
            lastResult.style.backgroundColor = '#006064';
            //set the background color
            lowOrHi.style.backgroundColor = '#006064';

            if (userGuess < randomNumber) { //if the guess was less than the number
                lowOrHi.textContent = 'Last Guess was Low!';

            } else if (userGuess > randomNumber) { //if the guess was higher than the number
                lowOrHi.textContent = 'Last Guess was High!';
            }
        }

        guessCount++; //increment the number of guesses
        guessField.value = ''; //clean the guessField
        guessField.focus(); //focus on the guessField
    }


}
//execute the checkGuess function every time the guessSubmit is clicked
guessSubmit.addEventListener('click', checkGuess);


//This function will be called when the game is ended
function setGameOver() {
    guessField.disabled = true; //disable the guessField
    guessSubmit.disabled = true; //disable the guessSubmit
    $('#resetBtn').show();  //showing the Play Again button
}


//This function will be called when the Play Again button is clicked
function resetGame() {
    guessCount = 1; //reset the guessCount
    //select all the paragraphs in the div tag with class .resultParas
    var resetParas = document.querySelectorAll('.resultParas p');
    //clean the text in all of the selected paragraphs
    for (var i = 0; i < resetParas.length; i++) {
        resetParas[i].textContent = '';
    }

    //hide the resetBtn 
    $('#resetBtn').hide();
    //hide the div tag with class .resultParas
    $('.resultParas').hide();

    guessField.disabled = false; //enable the guessField
    guessSubmit.disabled = false; //enable the guessSubmit
    //clean the value of guessField
    guessField.value = '';
    //focus on the guessField
    guessField.focus();
    //generate a new random number between 1 and 100
    randomNumber = Math.floor(Math.random() * 100) + 1;

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



















