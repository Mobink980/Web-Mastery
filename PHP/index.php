<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style>
    #contactUs{
        border: 1px solid #FFF3CD;
        border-radius: 15px;
        background-color: #FFF3CD;
        margin-top: 50px;
    }
    #contactUs > h3{
        font-size: 2.5em;
        font-weight: 600;
        font-family:monospace;
        margin-bottom: 20px;
    }
    #submitBtn{
        background-color: wheat;
        color: black;
        border: 3px solid #FFF3CD;
        border-radius: 5px;
    }
</style>
</head>
<body>
    <div class="page-header">
        <h1 class="alert alert-warning" align="center">Form Validation</h1>
    </div>
    <?php

    $name = "";
    $email = "";
    $message = "";
    $missingName = "<p><strong>Please enter your name.</strong></p>";
    $missingEmail = "<p><strong>Please enter your email address.</strong></p>";
    $invalidEmail = "<p><strong>Please enter a valid email address.</strong></p>";
    $missingMessage = "<p><strong>Please enter your message.</strong></p>";
    $error_message = "";
    $result_message = "";

    if(isset($_POST['submitBtn'])){ //if the button is pressed
        if($_POST['name']){ //check if name is empty
            $name = $_POST['name'];
            $name = filter_var($name, FILTER_SANITIZE_STRING); //get rid of destructive code
        
        }else{
            $error_message .= $missingName;
        }
        if($_POST['email']){ //check if email is empty
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_STRING);//get rid of destructive code
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //if the email was invalid
                $error_message .= $invalidEmail;
            }
        
        }else{
            $error_message .= $missingEmail;
        }
        if($_POST['message']){ //check if message is empty
            $message = $_POST['message'];
            $message = filter_var($message, FILTER_SANITIZE_STRING); //get rid of destructive code           
        
        }else{
            $error_message .= $missingMessage;
        }
        if(!$error_message){ //if no error occurs
            $to = "mobink980@gmail.com";
            $subject = "From website";
            $content = "
            <p>Name: $name</p>
            <p>From: $email</p>
            <p>Subject: $subject</p>
            <p><strong>Message: $message </strong></p>
            ";
            $header = "Content-type: text/html;";
            if(mail($to, $subject, $content, $header)){ //if sending the email was successful
                $result_message = "<div class='alert alert-success'>Thank you for sending us a message. :) </div>";
            
            }else{//if the message couldn't be sent
                $result_message = "<div class='alert alert-warning'>Unfortunately was unable to send the message! </div>";
            }
        }
    }
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12" id="contactUs">
                <h3>CONTACT US</h3>
                <?php
                    if($error_message){ //if we got any errors
                        echo "<div class='alert alert-danger'>$error_message</div>";
                    }

                    if($result_message){//if we got a result message
                        echo $result_message;
                    }
                ?>
                <form action="index.php"  method="POST">                  
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" 
                        value="<?php echo $name; ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" 
                        value="<?php echo $email; ?>">
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" class="form-control" placeholder="Message" 
                        rows="5"><?php echo $message; ?></textarea>
                    </div>
                    <button name="submitBtn" id="submitBtn" type="submit" class="btn btn-info btn-block">Send</button>
                    <br><br><br>
                </form>
            </div>

        </div>
    </div>
</body>
</html>