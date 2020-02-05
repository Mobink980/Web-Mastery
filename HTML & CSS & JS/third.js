// JavaScript Document
//All methods, objects and attributes are a subset of window
    //disappearing the circle
	document.getElementById("circle").onclick = function(){
		document.getElementById("circle").style.display = "none";
        MakeBox(); //appear again after a random time
	}
	
	//disappearing the rectangle
	document.getElementById("rectangle").onclick = function(){
		document.getElementById("rectangle").style.display = "none";
        MakeBox(); //appear again after a random time
	}
    //change the picture after clicking on it
	document.getElementById("image1").onclick = function() {
		document.getElementById("image1").style.display = "none";
        MakeBox(); //appear again after a random time
	}
	//show both shapes after disppearance
	document.getElementById("btnShowAll").onclick = function(){
		document.getElementById("circle").style.display = "block";
		document.getElementById("rectangle").style.display = "block";
	}
	//show both shapes in the same line
	document.getElementById("btnSameLineAll").onclick = function(){
		document.getElementById("circle").style.display = "inline-block";
		document.getElementById("rectangle").style.display = "inline-block";
	}
	//change the background-color and border of the shapes randomly
	document.getElementById("btnChangeBackground").onclick = function(){
		document.getElementById("circle").style.backgroundColor = ColorRandom(); //calling the function
		document.getElementById("rectangle").style.backgroundColor = ColorRandom();//calling the function
		document.getElementById("rectangle").style.border = "4px solid" + ColorRandom();
		document.getElementById("circle").style.border = "4px solid" + ColorRandom();
	}
		//show a text in a position
	document.getElementById("btnSetVariable").onclick = function(){
		var textContent = document.getElementById("textGetter").value;
		document.getElementById("line").innerHTML = textContent;
	}
		//show an array in the page
	document.getElementById("btnNames").onclick = function(){
		var arr = ["Ali", " Elizabeth", " Mary", " George"];
		arr.push(" Fatemeh");
		arr.push(" Ahmad");
		arr.push(" Zahra");
		arr.pop();
		var newArr = arr.concat(["Jenny", " Jennifer", " Kathrine", " Skyler"].reverse());
		//splice works exactly like pop() , but it can pop elements to a number after an index.
		/*we can also use splice to add elements to an specific part of array by writing 0 as the second argument and the thing we wanna add as the third*/
		
		//var subarr = arr.slice(1, 4); //slice works in the same way as the substring
		newArr.splice(2, 0, "Monica"); //adding Monica as the third element
		
		document.getElementById("line").innerHTML = newArr + "[ Length is:" + newArr.length +"]";
	}
			//showing basic programming
	document.getElementById("btnEvaluate").onclick = function(){
		var number = 8;
		/*if we use assignment(=) instead of equality (==) in the if, then the if is true. 
		Indeed, any number, even negative numbers except 0 in the condition is true. if(1236) is true.*/
		if(number >= 10){
			document.getElementById("line").innerHTML = "The number is greater than or equal to 10";
		}
		else{
		document.getElementById("line").innerHTML = "The number is less than 10";
		}
	}
/*show a random number between 2 and 10 (finds some number between 0 and 8 and then adds it with 2) : (Math.random() * 8) + 2*/
    
    //show a random integer
	document.getElementById("btnRandom").onclick = function(){
		//document.getElementById("line").innerHTML = Math.floor(Math.random() * 10);
		document.getElementById("line").innerHTML = Number(null) + Number("") + Number(true) + Number(false) + Number("10")
		+ Number("011") + Number("0011") + Number(0x1F); //prints 64
		document.getElementById("line").innerHTML = parseInt("11") + parseFloat("2.36"); //prints 13.36
	}
	
    //Showing how the loops work
	document.getElementById("btnLoop").onclick = function(){
		var names = ["Elizabeth","Jennifer","Mary","Skyler","Sue","Selena","Emma","Amelia","Kate"];
        var content = "";
        for(var i=0; i < names.length; i++){
            content += i + "." + names[i] + " ";
        }
        document.getElementById("line").innerHTML = content;
	}
    
    function sum(a, b){ //sum two numbers
        return a + b;
    }
    
    //Runs every time user clicks on a shape
  function MakeBox(){
        var time = Math.random() * 4000;        
            
        setTimeout(function(){ //Run after the time
            document.getElementById("circle").style.display = "block";
            document.getElementById("rectangle").style.display = "block";
            document.getElementById("image1").style.display = "block";
            
            document.getElementById("circle").style.left = (Math.random()*(window.document.body.clientWidth - 200)) + "px";
            document.getElementById("rectangle").style.left = (Math.random()*(window.document.body.clientWidth - 200)) + "px";
            
    }, time)
        }

        //A function to create colors randomly
        function ColorRandom(){
            //split each character of the string and put it in array letters
            var letters = "0123456789ABCDEF".split(''); 
            //alert(letters);
            var color = "#";
            var rand = 0;
            for(var i = 0; i < 6; i++){
                rand = Math.floor(Math.random()*16); //find an index between 0 and 15
                color += letters[rand]; //add the associated hex number to color
                
            }
            return color;
        }
//see the information of the user
document.getElementById("btnInfo").onclick = function(){
    alert(navigator.userAgent);
}
//A fake login for the user    
document.getElementById("btnLogin").onclick = function(){
    var result = prompt("What is your name?", "Elizabeth");
if (result != null){
    document.getElementById("para").innerHTML = "Welcome back " + result + ":-|)";
    }
else{
    document.getElementById("para").innerHTML = "input is null";
}
}    
function time(){
    var d = new Date();
    document.getElementById("timeOutput").innerHTML = "Time is " + d.toLocaleTimeString();
}
var interval;
function TimeStarter(){
    interval = setInterval(time, 1000); //it will run each second 
}

        //alert(window.document.body.clientWidth); //returns a value based on the size of the browser
        //alert(screen.width); //prints the width of the screen not the browser
        //ColorRandom();
        
//        setTimeout(function(){ //Runs 3 seconds after the page loaded
//        alert("Joe Biden says hello :-)");
//    }, 3000)
        
//    setInterval(function(){ //Runs every 3 seconds
//        document.getElementById("circle").style.display = "block";
//        document.getElementById("rectangle").style.display = "block";
//        document.getElementById("image1").style.display = "block";
//    }, 3000)
    //Some functions in javascript
	document.getElementById("btnCalculate").onclick = function(){
		var content = sum(20, 50);
        document.getElementById("line").innerHTML = content;
	}
    
var current = section1.firstElementChild;
document.getElementById("length").innerHTML = current.textContent;
for(var i = 0; i < section1.childElementCount; i++){
    document.getElementById("length").innerHTML += current.nextElementSibling.textContent;
    current = current.nextElementSibling;
}
    
    
//        if(section1.hasChildNodes){ //hasChildNodes are the sum of elements and enters in the parent tag
//            //childElementCount is the number of elements in the parent tag.
//            document.getElementById('length').innerHTML = section1.childElementCount;
//        }
