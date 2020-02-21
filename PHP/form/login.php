<?php
session_start();
if(isset($_SESSION["display-errors"]) and isset($_SESSION["error"])){
    $display_errors = $_SESSION["display-errors"];
    $error = $_SESSION["error"];
    $id = $_SESSION["id"];
}

$username = "";
$password = "";
if(isset($_POST["login"])){ //if the login button is clicked
    $conn = mysqli_connect("localhost", "root", "", "db");
    $query = "";
    $result = "";

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

    if(!$error){
        // $password = password_hash($password, PASSWORD_DEFAULT); //md5($password)
        $password = md5($password);
        $query = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password';";
        $result = mysqli_query($conn, $query);

        if(mysqli_affected_rows($conn) > 0){
            //echo "<div class='alert alert-info'>Login was successful.</div>";
            $_SESSION["username"] = $username;
            header("Location: session.php");
        
        }else{
            $error .= "The username or password was wrong!" . "<br/>";
            $display_errors = "block";           
        }
    }

}

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
            <h1 class="display-4">Login</h1>
            <hr>

            <div class="alert alert-danger" style="display: <?php if(isset($_SESSION["display-errors"])){
                echo $display_errors;
            }else{
                echo "none";
            } ?>;">
                <?php
                if($display_errors){
                    echo "<strong>$error</strong>";
                
                }else{
                    echo "<div id='success-alert' class='alert alert-success' role='alert' >
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>        
                        <strong>Login was successful!!</strong>
                    </div>";
                }
                    
                ?>
            </div>




            <form action="login.php" method="POST">
                <div style="margin: 0 auto; width: 60%;">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>">                   
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" value="<?php echo ""; ?>">                   
                </div>

                <button type="submit" name="login" class="btn btn-outline-primary btn-block">Login</button>
                <a href="list.php" class="btn btn-outline-primary btn-block">List</a>
            </form>




        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <script>
            window.setTimeout(function() {
            $("#success-alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 1500);
        </script>
    </body>
</html>