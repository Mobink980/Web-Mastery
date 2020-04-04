
<!-- Mentioning the name of the city and the parent of the city (state) -->
<h3>Forecast for <?php echo $city->title . ", " . $city->parent->title; ?></h3>

<div class="row">

    <?php foreach($city->consolidated_weather as $forecast ) { ?>

        <div class="col-md-6 col-lg-4 mb-3">

            <div class="card">
                <div class="card-body">
                    <h5><?php echo $forecast->applicable_date; ?></h5>
                    <!-- getting the associated image of a forecast -->
                    <img class="card-img-top" 
                    src="https://www.metaweather.com/static/img/weather/png/<?php echo $forecast->weather_state_abbr; ?>.png" alt="">
                    
                    <!-- typing the weather_state_name-->
                    <p><?php echo $forecast->weather_state_name; ?></p>
                    <hr>
                    <!-- number_format function will remove all the digits after the decimal point -->
                    <h6>Low: <?php echo number_format($forecast->min_temp); ?>°C</h6>
                    <h6>Max: <?php echo number_format($forecast->max_temp); ?>°C</h6>
                </div>
            </div>
        
        </div>

    <?php } ?>
    
</div>