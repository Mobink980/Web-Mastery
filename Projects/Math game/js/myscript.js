'use strict';
var number1;
var number2;

number1 = Math.floor((Math.random() * 18) + 1);
number2 = Math.floor((Math.random() * 13) + 1);

let operator = random_operator();
document.getElementById("number1").innerHTML = number1;
document.getElementById("number2").innerHTML = number2;
document.getElementById("operation").innerHTML = operator;

//compute the correct answer
var answer = compute(number1, number2, operator);

//or we can use querySelector('input[type=text]')
var checkAnswer = document.querySelector("#answer");
//getting the value of the input
var value = checkAnswer.value;
//or we can use querySelector('button[type=button]')
var btn = document.querySelector("#btn");

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

//A function to check the answer and return the result
btn.onclick = function () {
    value = checkAnswer.value;
    try {
        value = Number(value);
    }
    catch (err) {
        message = 'The statement cannot be evaluated!';
        showErr(message);
    }

    if (value == answer) {
        showCorrect("<strong class='large material-icons'>check</strong> CORRECT");

    } else {
        showFalse("<strong class='large material-icons'>clear</strong> INCORRECT! The answer was " + answer);
    }

    // Time out
    setTimeout(() => {
        document.querySelector("#answer").value = "";
        document.getElementById("number1").innerHTML = "";
        document.getElementById("number2").innerHTML = "";

        number1 = Math.floor((Math.random() * 18) + 1);
        number2 = Math.floor((Math.random() * 13) + 1);

        operator = random_operator();
        document.getElementById("number1").innerHTML = number1;
        document.getElementById("number2").innerHTML = number2;
        document.getElementById("operation").innerHTML = operator;
        answer = compute(number1, number2, operator);
    }, 2000);



};

//This function will show an alert when something is wrong 
function showErr(message) {
    // target the div tag with id='demo'
    const div = document.getElementById("demo");
    div.innerHTML = message;
    div.style.background = "#d32f2f";
    div.style.display = "block";
    // Time out
    setTimeout(() => {
        //remove the alert after 3 seconds
        div.style.display = "none";
    }, 4000);
}

//This function will show an alert when something is wrong 
function showCorrect(message) {
    // target the div tag with id='demo'
    const div = document.getElementById("demo");
    div.innerHTML = message;
    div.style.background = "#43a047";
    div.style.display = "block";
    // Time out
    setTimeout(() => {
        //remove the alert after 3 seconds
        div.style.display = "none";
    }, 2000);
}

//This function will show an alert when something is wrong 
function showFalse(message) {
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


//This function creates random operator
function random_operator() {
    var ops = new Array(3);
    ops[0] = '+';
    ops[1] = '-';
    ops[2] = '*';
    //generate a random number between 0 and 2
    let random = Math.floor((Math.random() * 3));

    return ops[random];
}

// console.log(random_operator());

//This function will compute the final result
function compute(a, b, op) {
    if (op === '+') {
        return a + b;

    } else if (op === '-') {
        return a - b;

    } else {
        return a * b;
    }
}
