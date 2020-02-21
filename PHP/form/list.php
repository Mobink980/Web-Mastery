<?php

$error = "";


$display_errors = "none"; 

$conn = mysqli_connect("localhost", "root", "", "db");
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

function printError($error){
    echo "<div class='alert alert-danger'>$error</div>";
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
            <h1 class="display-4 text-xs-center">Form</h1>
            <hr>
            <div style="margin: 0 auto; ">
            <div class="alert alert-danger" style="display: <?php echo $display_errors; ?>;">
                <?php
                    echo $error;
                ?>
            </div>
            <table class="table table-warning table-hover table-responsive" style="width: 85%; margin: 0 auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th> 
                        <th>Email</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){

                     
                    ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["firstname"]; ?></td>
                        <td><?php echo $row["lastname"]; ?></td>
                    </tr>

                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <br>
            <a href="index.php" class="btn btn-outline-primary btn-block">Return Home</a>
                        <br><br>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
    </body>
</html>