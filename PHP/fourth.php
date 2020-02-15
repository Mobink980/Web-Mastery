<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style>
</style>
</head>
<body>
    
    <div class="alert alert-primary"><strong>Retrieving Data</strong></div>
<div class="container">
    <?php
        printContent("PHP_SELF is ".$_SERVER['PHP_SELF']);
        printContent("SERVER_ADDR is ".$_SERVER['SERVER_ADDR']);
        printContent("SERVER_NAME is ".$_SERVER['SERVER_NAME']);
        printContent("SERVER_PORT is ".$_SERVER['SERVER_PORT']);
        printContent("SERVER_ADMIN is ".$_SERVER['SERVER_ADMIN']);
        printContent("QUERY_STRING is ".$_SERVER['QUERY_STRING']);
        printContent("REQUEST_METHOD is ".$_SERVER['REQUEST_METHOD']);
        printContent("REMOTE_ADDR is ".$_SERVER['REMOTE_ADDR']);
        // printContent("REMOTE_HOST is ".$_SERVER['REMOTE_HOST']); //does not work on local host
        printContent("SCRIPT_FILENAME is ".$_SERVER['SCRIPT_FILENAME']);
        printContent("SCRIPT_NAME is ".$_SERVER['SCRIPT_NAME']);
        printContent("HTTP_USER_AGENT is ".$_SERVER['HTTP_USER_AGENT']);
        // printContent("HTTP_ACCESS is ".$_SERVER['HTTP_ACCESS']); //does not work on local host
        printContent("HTTP_HOST is ".$_SERVER['HTTP_HOST']);

        
        

        function printContent($content){
            echo "<div class='alert alert-dark'>$content</div>";
        }
    ?>
</div>

    
    
</body>
</html>