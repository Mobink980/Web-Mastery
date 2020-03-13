'use strict';

//Defining the questions array
var questions = [
    {
        question: "What is the capital of Germany?",
        choices: ["Moscow", "Berlin", "Rasht", "Washington DC"],
        correctAnswer: 1
    },

    {
        question: "What is the capital of USA?",
        choices: ["Moscow", "Berlin", "Rasht", "Washington DC"],
        correctAnswer: 3
    },

    {
        question: "What is the capital of Russia?",
        choices: ["Moscow", "Berlin", "Rasht", "Washington DC"],
        correctAnswer: 0
    },

    {
        question: "What is the capital of Afghanistan?",
        choices: ["Moscow", "Berlin", "Kabul", "Washington DC"],
        correctAnswer: 2
    },

    {
        question: "What is the capital of France?",
        choices: ["Paris", "Berlin", "Rasht", "Washington DC"],
        correctAnswer: 0
    },

    {
        question: "What is the capital of Britain?",
        choices: ["Moscow", "Berlin", "Rasht", "London"],
        correctAnswer: 3
    },

    {
        question: "What is the capital of China?",
        choices: ["Moscow", "Berlin", "Pekan", "Washington DC"],
        correctAnswer: 2
    },

    {
        question: "What is the capital of Nicaragua?",
        choices: ["Moscow", "Berlin", "Pekan", "Managua"],
        correctAnswer: 3
    },

    {
        question: "What is the capital of Argentina?",
        choices: ["Moscow", "Berlin", "Baku", "Buenos Aires"],
        correctAnswer: 3
    },

    {
        question: "What is the capital of Brazil?",
        choices: ["Brasilia", "Mexico City", "Tehran", "Canberra"],
        correctAnswer: 0
    }
];

var currentQuestion = 0; //a variable indicating the index of the current question
var correctAnswers = 0; //a variable indicating the number of correctly answered questions
var quizOver = false; //quizOver becomes true whenever the quiz is over

//displaying the answered questions
document.getElementById('answered').innerHTML = '<p>'
    + currentQuestion + ' / ' + questions.length + '</p>';

//$(document).ready checks if the page is fully loaded before executing the code 
$(document).ready(function () {

    displayCurrentQuestion(); //displaying the very first question

    //hide the div tag with the class .quizMessage
    $(this).find(".quizMessage").hide();
    //when there is a click on the button, the function will be triggered
    $(this).find(".nextButton").on("click", function () {
        if (!quizOver) { //if the quiz is not over

            //getting the value of the checked radio button
            let value = $("input[type='radio']:checked").val();

            if (value == undefined) { //if no alternative has chosen
                //putting the alert text in the div tag with .quizMessage class
                $(document).find(".quizMessage").text("Please select an answer");
                $(document).find(".quizMessage").show(); //showing the div tag

            } else { // if some alternative is chosen

                //hide the div tag with the class .quizMessage
                $(document).find(".quizMessage").hide();

                //if the alternative chosen is the same as answer then increment the correctAnswer
                if (value == questions[currentQuestion].correctAnswer) {
                    correctAnswers++;
                }
                // going to the next question
                currentQuestion++;

                //updating the answered questions
                document.getElementById('answered').innerHTML = '<p>'
                    + currentQuestion + ' / ' + questions.length + '</p>';

                //if the index of the current question is less than 
                //the length of all the questions
                if (currentQuestion < questions.length) {
                    displayCurrentQuestion(); //display the current question

                } else { //otherwise, it means that the quiz is ended 

                    displayScore(); //display the scores
                    //change the text of the .nextButton from Next Question to Play Again?
                    $(document).find(".nextButton").text("Play Again?");
                    //set the quizOver variable to true
                    quizOver = true;
                }
            }
        } else { //when we get here, it means that the Play Again? is pressed
            //set the quizOver variable to false
            quizOver = false;
            //change the text of the .nextButton from Play Again? to Next Question
            $(document).find(".nextButton").text("Next Question");
            //set the currentQuestion to zero
            currentQuestion = 0;
            //updating the answered questions
            document.getElementById('answered').innerHTML = '<p>'
                + currentQuestion + ' / ' + questions.length + '</p>';
            //call the resetQuiz() function
            resetQuiz();
            //call the displayCurrentQuestion() function
            displayCurrentQuestion();
            //call the hideScore() function
            hideScore();
        }
    });

});



function displayCurrentQuestion() {
    // console.log("In display current question");

    //fetching the current question from the list of our questions
    var question = questions[currentQuestion].question;
    
    //target the div tag with class .question
    var questionClass = $(document).find(".quizContainer > .question");

    //target the div tag with class .choiceList
    var choiceList = $(document).find(".quizContainer > .choiceList");

    //getting the length of the alternatives for the current question
    var numChoices = questions[currentQuestion].choices.length;

    //set the questionClass text to the current question
    $(questionClass).text(question);

    //Remove all current <li> elements if any
    $(choiceList).find("p").remove();

    var choice;
    for (var i = 0; i < numChoices; i++) {
        //put the ith alternative of choices into variable choice 
        choice = questions[currentQuestion].choices[i]; 
        //add the choice as a radio button to the div tag with class .choiceList
        $('<p><label> <input type="radio" name="group2" value="' + i + '"> <span>' 
        + choice + ' </span> </label></p>').appendTo(choiceList);
    }
}

//This function is used to reset the quiz
function resetQuiz() {
    currentQuestion = 0;
    correctAnswers = 0;
    hideScore(); //calling the hideScore() function
}

function displayScore() {
    //putting an appropriate text in the div tag with class .result 
    $(document).find(".quizContainer > .result")
        .text("You scored: " + correctAnswers + " out of " + questions.length);

        //Determining the background color of the result message
    if (correctAnswers < 5) { //if the correct answers were less than 5
        document.getElementById('final').style.background = "#ffee58"; //yellow

    } else if (correctAnswers >= 5 && correctAnswers < 8) { //if the correct answers between 5 and 7
        document.getElementById('final').style.background = "#7cb342"; //light-green

    } else { //if the correct answers were more than 7
        document.getElementById('final').style.background = "#43a047";//dark-green
    }
    //show the div tag with class .result 
    $(document).find(".quizContainer > .result").show();
}

//This function will hide the div tag with class .result 
function hideScore() {
    $(document).find(".result").hide();
}










