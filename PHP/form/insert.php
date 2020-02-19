<?php

$error = "";
$username = "";
$password = "";
$email = "";
$name = "";
$family = "";
if(isset($_POST["send"])){ //if the user clicks on the button (legal entrance)
    if(isset($_POST["username"])){

        if(strlen($_POST["username"]) > 6){ //if the length of username is greater than 6
            $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING); //sanitize the username string
        
        }else{
            $error .= "The username must be greater than 6 characters!" . "<br/>";
        }

        if(strlen($_POST["password"]) > 6){ //if the length of password is greater than 6
            $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); //sanitize the password string
        
        }else{
            $error .= "The password must be greater than 6 characters!" . "<br/>";
        }

        if(strlen($_POST["email"]) > 6){ //if the length of password is greater than 6
            $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING); //sanitize the email string
            if($email = filter_var($email, FILTER_VALIDATE_EMAIL)){ //validate the email string
                $error .= "Please enter a valid email!" . "<br/>";
            }
        }else{
            $error .= "The email must be greater than 6 characters!" . "<br/>";
        }
    }

} else{ //if the entrance is illegal
    header("Location: index.php");
}

?>

<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css" >

        <style>

        </style>
    </head>

    <body>
        <div class="container">
            <h1 class="display-4">Form</h1>
            <hr>

            <div class="alert alert-danger" style="display: block;">
                An Error Occurred!!
            </div>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
    </body>
</html>