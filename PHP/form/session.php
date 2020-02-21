<?php
session_start();
if(isset($_GET["logout"])){
    if($_GET["logout"] == '1'){
        $_SESSION["username"] = "";
    }
}
if($_SESSION["username"]){
    $username = $_SESSION["username"];
    echo "<link rel='stylesheet' href='bootstrap.min.css' >";

    echo "<div class='container alert alert-info'>$username is login.</div>";

    
    echo "<a href='session.php?logout=1' class = 'container btn btn-outline-warning btn-block'>Logout</a>";

}else{
    header("Location: login.php");
}

