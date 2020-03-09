class OMDB {

  //constructor will run if an object of this class is created and called
  constructor() {
    this.key = 'e1c3cdf3';

  }

  async getMovies() {

    // fetching movies with our api key 
    const movieResponse = await fetch(`http://www.omdbapi.com/?apikey=${this.key}&s=game `);
 
    // fetching series with our api key
    const seriesResponse = await fetch(`http://www.omdbapi.com/?apikey=${this.key}&s=series `);


    const movieResults = await movieResponse.json(); //getting the movies in a json file
    const seriesResults = await seriesResponse.json(); ///getting the series in a json file


    return { //returning the search object of the two json files

      movie: movieResults.Search,
      series: seriesResults.Search

    }

  }

  async movieInfo(id) {
    //getting the information associated with the given id from the OMDB API
    const response = await fetch(`http://www.omdbapi.com/?apikey=${this.key}&i=${id}`);
    const results = await response.json(); //putting the result in a json file
    return results; 

  }


  async search(userText) {
    //getting the information associated with the search query from the OMDB API
    const response = await fetch(`http://www.omdbapi.com/?apikey=${this.key}&s=${userText}`);
    const results = await response.json(); //putting the result in a json file
    return results.Search; //returning the search object from the json file
  }


}