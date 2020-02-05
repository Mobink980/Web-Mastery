<?php


function PageHeader(){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div style="max-width:550px; margin:0 auto;" class="container">

        <header class="container">
            <h1 class="jumbotron text-center bg-secondary text-white">Internet Engineering</h1>
        </header>
<?php
}



function PageFooter(){
?>
        
        <footer class="container">
            <h6 class="jumbotron text-center bg-secondary text-white">University of Guilan</h6>
        </footer>

    </div>
</body>
</html>
<?php
}
    

?>