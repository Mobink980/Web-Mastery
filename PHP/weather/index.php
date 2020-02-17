<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
<link rel="stylesheet" href="bootstrap.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php
include_once("header.php");

$display_alert = "none";
$city = "";
$result = "";
if(isset($_GET["city"])){ //if the button is clicked. It should arrive legally
    $city = filter_var($_GET["city"], FILTER_SANITIZE_STRING); //remove the effect of destructive code 

    if(trim($city)){ //if there was any text in the input box. Should not be empty
        $header_page = @get_headers("https://www.weather-forecast.com/locations/$city/forecasts/latest");

        if($header_page[0] != "HTTP/1.1 404 Not Found"){ //if the user input was not a meaningful city
            $forecast =  file_get_contents("https://www.weather-forecast.com/locations/$city/forecasts/latest");
            $file = explode("class=\"phrase\"", $forecast);       
            $result = substr($file[1], 1, strpos($file[1], "</span>") - 1);

            $display_alert = "block";
        
        }else{ //if the name of the city was meaningless
            $display_alert = "block";
            $result = "$city is not found!";
        }
   
}else{ //if the text box was empty
    $display_alert = "none";
}
  
}
?>


<html>
    <head>
        <title>weather</title>
    </head>

    <style>
    body{
        font-family: 'Times New Roman', 'Times, serif';
        background-image: url("forest.jpg");
        color: white !important;
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;

        color: white;
    }
    .container{
        margin-top: 200px;
        text-align: center;
        width: 500px !important;
    }
    #bottom{
        width: 100% !important;
    }
</style>
    <body>
<div class="container">
    <div class="row">
        <div class="weather">
            <h1>
                What's the Weather?
            </h1>
            <form action="">
                <fieldset class="form-group"> 
                    <label for="txtcity"><h4>Enter the name of a city:</h4></label>
                    <input id="txtcity" type="text" name="city" class="form-control" placeholder="Eg. Tehran Ahwaz" 
                    value="<?php echo $city; ?>">
                </fieldset>
                <input type="submit" class="btn btn-success" value="Forecast the Weather">

            </form>
            <div class="alert alert-success" style="display: <?php echo $display_alert; ?>">
                <?php
                    echo $result;
                    // echo var_dump(get_headers("https://www.weather-forecast.com/locations/Tkfskdfjkl/forecasts/latest"));
                ?>
            </div>

    </div>
</div>


</body>
</html>

<?php
include_once("footer.php");
?>







