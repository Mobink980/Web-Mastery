class UI {

  //constructor is invoked immediately when an instance of this class is used
  constructor() {
    this.display = document.getElementById('displayRow'); //getting the tbody of our table
    this.notify = document.getElementById('notification'); //getting the div tag above table to show alerts
  }

  //This method will show the results of the query in the index.html (both table and the alert)
  showResults(data) {

    const results = data.airports;

    console.log(results);

    let output = "";
    //The following for will print all the results in our table in the index.html 
    //(saving in variable output)
    for (let index = 0; index < results.length; index++) {
      output += "<tr>"; //creating a table row element

      output += "<td>" + results[index].name + "</td>";
      output += "<td>" + results[index].iata + "</td>";
      output += "<td>" + results[index].state.type + "</td>";
      output += "<td>" + results[index].city + "</td>";
      output += "<td>" + results[index].state.name + "</td>";
      output += "<td>" + results[index].country.name + "</td>";

      output += "</tr>";
    }

    // console.log(output);

    // Notifying the number of airports found based on the query (in the div tag we get in constructor)
    this.notify.innerHTML = `
    <article class="message is-primary">
    <div class="message-body">
     Showing <span class="tag is-success">${results.length}</span>
     Results for ${data.term.toUpperCase()}
    </div>
  </article>  
    `;

    // TimeOut (It will show the alert for 7 seconds)
    setTimeout(() => {
      const currentAlertS = document.querySelector('.is-primary');

      if (currentAlertS) {

        currentAlertS.remove();
      }

    }, 7000);


    //putting the data got from restful API into the table
    this.display.innerHTML = output;
  }

  //This method will show an alert when the query is inappropriate (in the div tag we get in constructor)
  showAlert(data) {
    // console.log(data.message);

    this.notify.innerHTML = `
    <article class="message is-danger">
    <div class="message-body">
     ${data.message}
    </div>
  </article>`;

    // TimeOut (calling the clearAlert method after 3 seconds)
    setTimeout(() => {
      this.clearAlert();
    }, 3000);

  }

  // Method to Clear alert message
  clearAlert() {
    const currentAlert = document.querySelector('.is-danger'); //get the alert with class 'is-danger'
    if (currentAlert) { //if there is such alert then remove it

      currentAlert.remove();
  
    }
  }

  // Spinner (the circle spinning in the search bar)
  inputSpinner() {
    const spinner = document.getElementById('loading'); //getting the div with id 'loading'
    spinner.classList.add('is-loading'); //add the is-loading class to its classList

    //TimOut the spinning after 2 seconds 
    setTimeout(() => {

      //remove the is-loading class from its classList after 2 seconds
      spinner.classList.remove('is-loading'); 

    }, 2000);




  }

  // Clear Profile

  clearProfile() {

    this.display.innerHTML = '';
  }
}



// Whenever this instance is called, the constructor will run immediately
export const ui = new UI();