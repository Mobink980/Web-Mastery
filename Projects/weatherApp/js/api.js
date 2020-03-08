class OpenWeather {
  /** In this class we get the results in a json file from open weather map */
  //The constructor will immediately run after an instance of the class is called
  constructor() {
    // this.url = 'http://api.openweathermap.org/data/2.5/weather?q=';
    this.apikey = 'c89504892c44b1216b6275cb982b1478';
  }

  async search(cityName) {

    //Making call to open weather map 
    const response = await fetch(`https://api.openweathermap.org/
    data/2.5/weather?q=${cityName}&appid=${this.apikey}`);

    //Getting the response by the open weather API as json
    const results = await response.json();

    // console.log(results); //showing the results in the console

    return results;

  }







  // search(cityName) {
  //   const cName = cityName;
  //   const url = this.url;
  //   const apikey = this.apikey;

  //   fetch(url + cName + '&appid=' + apikey).then(function (response) {

  //     console.log(response.json());

  //   })
  // }

}