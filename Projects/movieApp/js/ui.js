class UI {

  //constructor will run if an object of this class is created and called
  constructor() {
    this.carousel = document.querySelector('.carousel'); //get the div with class .carousel
    this.series = document.querySelector('.display'); //get the div with class .display
    this.movieInfo = document.querySelector('.movieInfo'); //get the div with class .movieInfo
    this.search = document.querySelector('.display'); //get the div with class .display (unnecessary!)
  }

  showMovies(data) {

    let output = '';

    data.forEach(results => {


      output += ` 
 
 <div class = 'carousel-item'>

        <div class="card medium black">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="${results.Poster}">
        </div>
        <div class="card-content black">
          <span class="card-title activator white-text text-darken-4">${results.Title}<i
              class="material-icons right">more_vert</i></span>
          
        </div>
        <div class="card-reveal black">
          <span class="card-title white-text text-darken-4">${results.Title}<i class="material-icons right">close</i></span>
         <p class="green-text"> Type: <span class="red-text"> ${results.Type} </span> </p> 
        
          <p class="green-text"> Year: <span class="red-text"> ${results.Year}</span></p>

          <a class="waves-effect waves-light green btn-small" onclick="movieClicked('${results.imdbID}')" href="#">More Info..</a>

        </div>
      </div>
    
 </div>
 
 `;


    });

    this.carousel.innerHTML = output; //putting the results in our carousel (our div tag)

    const elems = this.carousel;
    M.Carousel.init(elems);
  }




  showSeries(data) {


    let output = '';

    data.forEach(results => {

      output += `
      
      <div class="col s3">
      <div class="card medium black">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="${results.Poster}">
        </div>
        <div class="card-content black">
          <span class="card-title activator white-text text-darken-4">${results.Title}<i
              class="material-icons right">more_vert</i></span>
          
        </div>
        <div class="card-reveal black">
          <span class="card-title white-text text-darken-4">${results.Title}<i class="material-icons right">close</i></span>
         <p class="green-text"> Type: <span class="red-text"> ${results.Type} </span> </p> 
        
          <p class="green-text"> Year: <span class="red-text"> ${results.Year}</span></p>

          <a class="waves-effect waves-light green btn-small" onclick="movieClicked('${results.imdbID}')" href="#">More Info..</a>

        </div>
      </div>
    </div>
    
    `;

    });

    this.search.innerHTML = output; //putting the results in the div tag with class .display

  }


  showInfo(info) {

    let output = `
    
    <div class="card horizontal">
        <div class="card-image">
          <img src="${info.Poster}">
        </div>
        <div class="card-stacked black">
          <div class="card-content black">
          <ul class="collection with-header ">
          <li class="collection-header"><h4>${info.Title}</h4></li>
          <li class="collection-item"><strong class="flow-text">Actors:</strong> <span>${info.Actors}</span></li>
          <li class="collection-item"><strong class="flow-text" >Awards:</strong> <span>${info.Awards}</span></li>
          <li class="collection-item"><strong class="flow-text">Genre:</strong> <span>${info.Genre}</span></li>
          <li class="collection-item"><strong class="flow-text">Released:</strong> <span>${info.Released}</span></li>
          <li class="collection-item"><strong class="flow-text">Rated:</strong> <span>${info.imdbRating}</span></li>

        </ul>
          </div>
          <div class="card-action">
            <a href="https://www.imdb.com/title/${info.imdbID}" target="_blank">Watch on IMDB >>></a>
            <a href="/index.html"><<< Go Back Home</a>
          </div>
        </div>
      </div>
    </div>
    
    `;

    this.movieInfo.innerHTML = output;


  }


  showSearch(data) {

    let output = '';

    data.forEach(results => {

      output += `
      
      <div class="col s3">
      <div class="card medium black">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="${results.Poster}">
        </div>
        <div class="card-content black">
          <span class="card-title activator white-text text-darken-4">${results.Title}<i
              class="material-icons right">more_vert</i></span>
          
        </div>
        <div class="card-reveal black">
          <span class="card-title white-text text-darken-4">${results.Title}<i class="material-icons right">close</i></span>
         <p class="green-text"> Type: <span class="red-text"> ${results.Type} </span> </p> 
        
          <p class="green-text"> Year: <span class="red-text"> ${results.Year}</span></p>

          <a class="waves-effect waves-light green btn-small" onclick="movieClicked('${results.imdbID}')" href="#">More Info..</a>

        </div>
      </div>
    </div>
    
    `;

    });

    this.series.innerHTML = output;


  }

}