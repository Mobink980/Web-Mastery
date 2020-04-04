<?php

//setting the global $_GET to variable get
$get = $_GET;

$template = '';

if (isset($get['query'])) { //checking whether we have a query in the textbox

    $city = filter_var($get['query'], FILTER_SANITIZE_STRING); //remove the effect of destructive code
    if (trim(($city))) { //if there was any text in the input box. Should not be empty
        $cities = searchCities($city);

        //if there was any result cities for the user query
        if ($cities) {
            $template = "cities-template.php";
        }
    }

} else if (isset($get['cityId'])) { //if the cityId is set

    $city = getForecast($get['cityId']);

    if ($city) {
        $template = "forecast-template.php";
    }
}

//This method will get the city names when we search a query inside the textbox
function searchCities($query)
{
    //getting the page content on the written query (urlencode will replace the space with special characters to avoid error)
    $cities = file_get_contents("https://www.metaweather.com/api/location/search/?query=" . urlencode($query));
    //convert the Json into objects
    return json_decode($cities);

}

//This method will get the 6-day forecast on the cityId when the button of one of the cities is clicked
function getForecast($cityId)
{
    //getting the page content on the written cityId (urlencode will replace the space with special characters to avoid error)
    $forecast = file_get_contents("https://www.metaweather.com/api/location/" . urlencode($cityId));
    //convert the Json into objects
    return json_decode($forecast);
}

?>

<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <title>Weather Application</title>

        <style>
            .container {
                margin-top: 7%;
            }
            body {
                background-repeat: no-repeat;
                background: url("./img/back-min.jpg") center center;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
            <div class="col-md-6 d-flex flex-column mx-auto text-center">
                <h3 style="color: #fff; font-weight:600; font-size:2.1em;">Weather Forecast</h3>

                <form method="GET">

                    <div class="row">
                        <div class="form-group input-group-lg m-auto">
                            <input type="text" name="query" class="form-control" placeholder="Type a city name">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group input-group-lg m-auto">
                            <input type="submit" class="btn btn-info btn-block" value="Search">
                        </div>
                    </div>

                </form>

                <?php
//if $template is true then include_once $template; otherwise set empty string to $template
//basically if we got queries inside the address bar, we're going to redirect to cities-template.php
//similarly, if we got cityId inside the address bar, we're going to redirect to forecast-template.php
$template ? include_once $template : '';
?>
            </div>
        </div>
        </div>

    </body>
</html>