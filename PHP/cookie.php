<?php
session_start(); 
?>
<html>
    <head>
        <title>Cookies</title>       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class='alert alert-primary'><strong>Sessions & Cookies & Error Handling</strong></div>
        <div class="container">
            <?php

            ini_set("display_errors", "On"); //change the value of display_errors in php.ini (to find out what is the problem)
            setcookie("username", "Mobink980", time() + 60); //this method must be called at the beginning.(1 minute life-span)
            //cookie is a text file crated by server sent to the browser of the users
            // var_dump($_COOKIE);
            if(isset($_COOKIE["username"])){ //if the cookie with that name is set
                $cookie_name = $_COOKIE["username"];
                printContent("The name of the cookie is $cookie_name.");

            }else{
                printContent("The cookie is not set!!");
            }

            function printContent($content){
                echo "<div class='alert alert-dark'>$content</div>";
            }

            function printError($error){
                echo "<div class='alert alert-danger'>$error</div>";
            }

            function error1($level, $message, $file, $line, $context){
                printError("Error: [$level] $message in $file at $line");
                // var_dump($context);
            }
            set_error_handler("error1");
            $size = filesize("text2.txt");

            $file = file_exists("text2.txt");
            if(!$file){ //if file does not exist
                trigger_error("File does not exists", E_USER_ERROR);
            }
            //We had to run cookies two times. One time when is sent from server to browser and the 
            //other when it is sent from browser to server. But with session we only run one time. Because all
            //the work is done on the server side
            $_SESSION["username"] = "Maziear"; //creating some sessions
            $_SESSION["email"] = "maziear1366poc@gmail.com";

            if(isset($_SESSION["username"])){
                printContent($_SESSION["username"]);
                printContent(session_id());
                printContent(session_name());
            }
            session_destroy();
            ?>
        </div>
    </body>
</html>

