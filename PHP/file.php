<!DOCTYPE html>
<html>
<head>
<title>upload</title>
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
<?php
        //$_FILES is an associative array containing name, type, tmp_name, error, size (Bytes)
        //file => (name, type, tmp_name, error, size (Bytes))
        $display_result = "none";
        $result = "";
        $error = "";
        if(isset($_POST["submit"])){ //if the button was clicked
            // var_dump($_FILES);
            // print_r($_FILES);
            $file_name = $_FILES["file"]["name"]; //name of the file
            $file_type = $_FILES["file"]["type"];
            $file_tmp = $_FILES["file"]["tmp_name"];
            $file_error = $_FILES["file"]["error"];
            $file_size = $_FILES["file"]["size"];
            
            // printContent("The name of the file is $file_name. The type of the file is $file_type. The file temporary location is
            // $file_tmp. The number of errors is $file_error. The size of the file is $file_size bytes");

            $destination = "uploads/$file_name"; //the address that we want to send the files to
            //moving the file fromm the temporary location to the final destination
            if(move_uploaded_file($file_tmp, $destination)){ //if sending the file was successful
                $result = "File $file_name uploaded successfully.";
                $display_result = "block";
                
            }else{ //if sending failed
                $result = "File upload failed!";
                $display_result = "block";
            }
        
        }else{ //if the button is not clicked
            $display_result = "none";
        }
        function printContent($content){
            echo "<div class='alert alert-dark'>$content</div>";
        }
    ?>
    <div class="alert alert-success"><strong>File Uploading</strong></div>
    <div class="text-center  container" style="margin-top: 20px;">
    <h2 class="page-header">File Upload</h2>
    <!-- we use enctype="multipart/form-data" because we want our file to be sent part by part in packages.
        The method must be post. -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="file" >
            </div>
            <input type="submit" name="submit" value="upload" class="btn btn-danger btn-block">
        </form>
        <div class="alert alert-info" style=" margin-top: 20px; display: <?php echo $display_result; ?>;">
            <?php 
                echo $result;
            ?>
        </div>

    </div>


</body>
</html>