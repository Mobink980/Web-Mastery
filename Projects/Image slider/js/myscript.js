//Initialize slide index with 1
var slideIndex = 1;
//calling the showDivs() function
showDivs(slideIndex);

// plusDivs() function increments or decrements slideIndex based on the button pressed
function plusDivs(n){
    showDivs(slideIndex += n);
}

function showDivs(n){
    var i;
    //targeting all the elements with class mySlides
    var x = document.getElementsByClassName("mySlides");
    //if the photos are finished, then we set slideIndex to 1
    if(n > x.length){
        slideIndex = 1;
    }
    //if the photos are finished by pressing the back button, 
    //then we set slideIndex to x.length
    if(n < 1){
        slideIndex = x.length;
    }
    //Hide all the pictures
    for(i = 0; i < x.length; i++){
        x[i].style.display = "none";
    }

    //Only show the picture which is on
    x[slideIndex - 1].style.display = "block";
}