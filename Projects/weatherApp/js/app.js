// Init OpenWeather
const getWeather = new OpenWeather(); //creating an instance of the class OpenWeather

// Init UI
const ui = new UI(); //creating an instance of the class UI


// Search City

const searchCity = document.querySelector('.searchCity'); //targeting the search place

// Add Event Listener

searchCity.addEventListener('keyup', (event) => {

  // Get Input from the search place
  const userText = event.target.value;

  // console.log(userText);

  // Make a request to Open Weather API (using the instance we created)
  getWeather.search(userText).then(data => {

    console.log(data);

    // Temperature Conversion (to show user understandable result)
    const degC = data.main.temp - 273.15; 
    const degCr = Math.floor(degC); //temperature in centigrade
    const degF = degC * 1.8 + 32; 
    const degFr = Math.floor(degF); //temperature in Fahrenheit

    //data.weather is an array
    results = {
      condition: data.weather[0].main,
      icon: 'http://openweathermap.org/img/w/' + data.weather[0].icon + '.png',
      degCr: Math.floor(degCr),
      degFr: Math.floor(degFr),
      city: data.name

    }
    // Display Results
    ui.showResults(results);


  });


});


