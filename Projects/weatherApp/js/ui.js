class UI {
  /** In this class we show the results in our website */

  constructor() {
    this.display = document.getElementById('display'); //targeting the div tag with id ='display'
  }

  showResults(results) {


    //defining a variable to show the results in our div tag
    // \u00B0 is HTML unicode for centigrade
    //
    let output = `
    
     <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text darken-4">${results.city}&nbspWeather</h1>
        
        <div class="row center">
        <p><b>${results.condition}</b></p>
          <img src="${results.icon}" width="100" height="100"">
        </div>
        <div class="row center">
          <p class="flow-text">${results.degCr}\u00B0 C / ${results.degFr}\u00B0 F</p>
        </div>
        <br><br>
      </div>
      </div> 
      
      `;
    this.display.innerHTML = output;



  }

}