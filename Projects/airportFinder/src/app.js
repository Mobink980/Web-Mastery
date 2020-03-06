import { multi } from './air-port-codes-node';
import { UI, ui } from './ui'; //importing the UI class to call the instance ui
//Search Airports
const searchAirport = document.getElementById("search");

//Add event listener
searchAirport.addEventListener('keyup', e => {
  
  //calling the method inputSpinner() for the spinner in the search bar
  ui.inputSpinner();

  //get user input
  const term = e.target.value;

  // console.log(term);
  if (term !== '') {
    //Make an HTTP call to the API
    const api = multi({
      key: 'f170b9e5aa',
      secret: 'fe1682cc2adfdba', // Your API Secret Key: use this if you are not connecting from a web server
      limit: 20
    });

    api.request(term);

    //Listening to the response
    // SUCCESS we found some airports
    api.onSuccess = (data) => {
      //calling the showResults() method from the UI class (ui is the instance of the class UI)
      ui.showResults(data); 
    };

    // FAIL no airports found
    api.onError = (data) => {
      ui.showAlert(data);
    };

  } else {

  }
})