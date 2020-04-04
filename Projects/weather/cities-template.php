
<!-- The number of cities found is the size of the array -->
<h3 class="text-center"> 
    <?php 
    if(sizeof($cities) == 0){
        echo "No cities were found.";
    
    } else if(sizeof($cities) == 1){
        echo "1 city was found";
    
    } else {
        echo sizeof($cities) . " cities were found."; 
    }   

    ?>  
</h3>

<div class="row">

    <?php foreach( $cities as $city ) { ?>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top" src="img/city-min.jpg" alt="city">
                    <h5 class="card-title"><?php echo $city->title; ?></h5>
                    <a href="?cityId=<?php echo $city->woeid ?>" class="btn btn-info">Forecast</a>
                </div>
            </div>
        </div>

    <?php } ?>

</div>