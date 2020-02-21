<?php
session_start();
$error = "";

$id = "";
$username = "";
$password = "";
$email = "";
$name = "";
$family = "";

$display_errors = "none"; 
$display_table = "none";
if(isset($_POST["send"])){ //if the user clicks on the button (legal entrance)
    if(isset($_POST["username"])){

        if(strlen($_POST["username"]) > 4){ //if the length of username is greater than 4
            $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING); //sanitize the username string
        
        }else{
            $error .= "The username must be greater than 4 characters!" . "<br/>";
            $display_errors = "block";
        }

        if(strlen($_POST["password"]) > 6){ //if the length of password is greater than 6
            $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); //sanitize the password string
        
        }else{
            $error .= "The password must be greater than 6 characters!" . "<br/>";
            $display_errors = "block";
        }

        if(strlen($_POST["email"]) > 6){ //if the length of password is greater than 6
            $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING); //sanitize the email string
            if(!$email = filter_var($email, FILTER_VALIDATE_EMAIL)){ //validate the email string 
                $error .= "Please enter a valid email address!" . "<br/>"; //show error if it's not valid
                $display_errors = "block";
            }
        }else{
            $error .= "The email address must be greater than 6 characters!" . "<br/>";
            $display_errors = "block";
        }

        if(strlen($_POST["name"]) > 0){ //if the length of name is greater then 0
            $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING); //sanitize the name string
        
        }else{ //if the user didn't fill out name
            $name = " ";
        }

        if(strlen($_POST["family"]) > 0){ //if the length of name is greater then 0
            $family = filter_var($_POST["family"], FILTER_SANITIZE_STRING); //sanitize the family string
        
        }else{
            $family = " ";
        }
    }

    if(!$error){ //show the table when we have no error. Also connecting to database
        $connect = mysqli_connect('localhost', 'root', '', 'db'); //hi is the name of the database :-)
        if(mysqli_connect_error()){ //if the connection fails
            printError("The connection Failed!!");
            printError(mysqli_connect_error());
            
        }
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $password = md5($password); 
        $query = "INSERT INTO users VALUES (null, '$username', '$password', '$email', '$name', '$family');"; //query to insert into table 
        $result = mysqli_query($connect, $query);
        if(mysqli_affected_rows($connect) > 0){
            $display_table = "block"; //show the table 

            $query = "SELECT id FROM users WHERE username = '$username';"; //query to get the id based upon the username
            $result = mysqli_query($connect, $query); //running the query
            $id = mysqli_fetch_assoc($result);  //saving the result in $id
            // print_r($id);
        }else{ //if there was a problem
            $error = "There was a problem inserting your data! Make sure your username is unique.";
            $query = "SELECT id FROM users ORDER BY id DESC LIMIT 1;"; //query to get the last registered id from the table
            $result = mysqli_query($connect, $query); //running the query
            $id = mysqli_fetch_assoc($result);  //saving the result in $id
            $last_id = (int)$id["id"]; //converting the last id into an integer

            $query = "ALTER TABLE users AUTO_INCREMENT = $last_id;"; //query to modify the AUTO_INCREMENT 
            $result = mysqli_query($connect, $query); //running the query
            
            $display_table = "none";
            $display_errors = "block";
        }

        
    
    }else{ //if we got an error then no need to display the table
        $display_table = "none";
    }

    //Creating some sessions
    $_SESSION["display-errors"] = $display_errors; 
    $_SESSION["error"] = $error;
    $_SESSION["id"] = $id;


    header("Location: index.php"); //go back after you are finished
} else{ //if the entrance is illegal
    header("Location: index.php");
}

function printError($error){
    echo "<div class='alert alert-danger'>$error</div>";
}
?>
