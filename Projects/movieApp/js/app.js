// Init API

const omdb = new OMDB(); //creating an instance of the class OMDB from app.js

// Init UI

const ui = new UI(); //creating an instance of the class UI from ui.js

// Get Movies using OMDB API

document.addEventListener('DOMContentLoaded', getMoives);

// Search Movies using OMDB API

document.getElementById('searchForm').addEventListener('submit', searchMovie);


// Get Movies Function
function getMoives() {
  // Make a Request to API

  omdb.getMovies().then(results => {

    console.log(results.movie);

    ui.showMovies(results.movie); //calling the showMovies() method from ui.js
    ui.showSeries(results.series); //calling the showSeries() method from ui.js


  }).catch(err => {

    console.log(err); //if any, print the error in console

  })

}

// Search Movie Function

function searchMovie(e) {

  //getting the first descendent element from search place 
  const inputText = document.querySelector('.search'); 

  // Getting the Input Text 
  const userText = inputText.value;

  // Make a call to API

  omdb.search(userText).then(results => {

    ui.showSearch(results); //calling the showSearch() method from ui.js

  }).catch(err => {

    console.log(err); //if any, print the error in console
  })


  e.preventDefault();
}


// Movie Clicked
function movieClicked(id) {

  // console.log(id);
  //setItem Sets the value of the pair identified by key to value.
  sessionStorage.setItem('movieID', id);
  location.assign('./movie.html'); //Navigates to the './movie.html' URL.
  return false;

}


// Movie Info

function movie_info() {

  //getItem Returns the current value associated with the given key.
  let id = sessionStorage.getItem('movieID');

  // Make a call to omdb API

  omdb.movieInfo(id).then(results => {

    ui.showInfo(results); //calling the showInfo() method from ui.js


  }).catch(err => {

    console.log(err);  //if any, print the error in console
  })


}

