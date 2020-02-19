<!DOCTYPE html>
<html>
    <head>
        <title>Database</title>       
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
    <div class='alert alert-success'><strong>MySQL Database Connection</strong></div>
        <div class="container">
            <?php
                $connect = mysqli_connect('localhost', 'root', '', 'hi'); //hi is the name of the database :-)

                if(mysqli_connect_error()){ //if the connection fails
                    printError("The connection Failed!!");
                    printError(mysqli_connect_error());
                    
                }else{
                    printContent("The connection was successful.");
                }

                $sql = "SELECT page_title, page_url FROM hi.search WHERE page_id between 10 and 40";
                mysqli_query($connect, $sql); //perform the query on the database
                printContent(mysqli_affected_rows($connect)); //printing how many rows are affected


                mysqli_close($connect);// closing the connection to save resources
                function printContent($content){
                    echo "<div class='alert alert-dark'>$content</div>";
                }
    
                function printError($error){
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            ?>
        </div>
    </body>
</html>

