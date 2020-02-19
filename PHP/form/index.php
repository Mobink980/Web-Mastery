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
            <form action="insert.php" method="POST">
                <div style="margin: 0 auto; width: 60%;">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username" >                   
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="text" name="password" class="form-control" placeholder="Password" >                   
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
                    <button type="submit" name="send" class="btn btn-outline-success btn-block">Submit</button>
                </div>

            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
    </body>
</html>