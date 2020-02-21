<?php
session_start();
if(isset($_SESSION["display-errors"]) and isset($_SESSION["error"])){
    $display_errors = $_SESSION["display-errors"];
    $error = $_SESSION["error"];
    $id = $_SESSION["id"];
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
            <h1 class="display-4">Form</h1>
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
                        <strong>Your data inserted successfully!!</strong>
                    </div>";
                }
                    
                ?>
            </div>




            <form action="insert.php" method="POST">
                <div style="margin: 0 auto; width: 60%;">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username" >                   
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" >                   
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" class="form-control" placeholder="Email" >                    
                </div>

                <div class="form-group">
                    <label for="name">Firstname</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Firstname" >                    
                </div>

                <div class="form-group">
                    <label for="family">Lastname</label>
                    <input id="family" type="text" name="family" class="form-control" placeholder="Lastname" >         
                </div>
                    <button type="submit" name="send" class="btn btn-outline-primary btn-block">Submit</button>
                    <a href="list.php" class="btn btn-outline-primary btn-block">List</a>
                </div>

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