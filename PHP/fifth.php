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
</style>
</head>
<body>
    
    <div class="alert alert-warning"><strong>File Handling</strong></div>
<div class="container">
    <?php

        //Mode r => read-only     w => write-only   r+ => both read & write  w+ => both read & write   a => append  a+
        //The difference between w+ and r+: w+ will erase whatever content in the file and will create one if does not 
        //exist. r+ does not erase the contents of the file. (unless the pointer in a place which would cause an overwrite)
        $filename = "address.txt";
        if(file_exists($filename)){
        $address = fopen("address.txt", "r");
        // printContent(fread($address, filesize("address.txt")));
        while(!feof($address)){
            echo "<strong>" . fgets($address) ."</strong><br/>";

        }
        fclose($address);
        
    }else{
        echo "<strong>" . "$filename does not exist!"."</strong><br/>";
    }

        $filename1 = "address1.txt";
        if(file_exists($filename1)){
            $file = fopen($filename1, "a"); //if we write "w" it will be replaced with the previous content
            if($file){
                fwrite($file, "https://www.microsoft.com");
                fwrite($file, "\n");
                fclose($file);
            }
        }
        
            $filename2 = "address2.txt";   
            $file = fopen($filename2, "w+"); //if we write "w" it will be replaced with the previous content
            if($file){
                fwrite($file, "https://www.microsoft.com");
                fwrite($file, "\n");
                fwrite($file, "https://www.microsoft.com");
                fwrite($file, "\n");
                fwrite($file, "https://www.microsoft.com");
                fwrite($file, "\n");
                fwrite($file, "https://www.microsoft.com");
                fwrite($file, "\n");
                fwrite($file, "https://www.microsoft.com");
                fwrite($file, "\n");

                fseek($file, 0); //set the pointer to the beginning of the file
                printContent(fread($file, filesize($filename2))); 
                fclose($file);
            }
        
            $filename3 = "address3.txt";   
            $file = fopen($filename3, "r+"); //if we write "w" it will be replaced with the previous content
            if($file){
                fseek($file, filesize($filename3)); //set the pointer to the beginning of the file
                fwrite($file, "https://www.microsoft.com");
                fwrite($file, "\n");
                fwrite($file, "https://www.google.com");
                fwrite($file, "\n");
                fwrite($file, "https://www.bing.com");
                fwrite($file, "\n");
                fwrite($file, "https://www.yahoo.com");
                fwrite($file, "\n");
                fwrite($file, "https://www.amazon.com");
                fwrite($file, "\n");
                
                fseek($file, 0); //set the pointer to the beginning of the file
                
                printContent(fread($file, filesize($filename2))); 
                fclose($file);
            }

            printContent(file_get_contents($filename3)); //reading a file as a stream of strings
            $str = 'This file is created by file_put_contents';
            file_put_contents("address4.txt", $str); //creating a new file and writing a string into it

            $my_file = file($filename3); //creating an associative array of the file
            var_dump($my_file); 
            printContent($my_file[5]); //printing the sixth element of the array created from file

            foreach($my_file as $line){
                linkBuilder($line);
            }


        function printContent($content){
            echo "<div class='alert alert-dark'>$content</div>";
        }

        function linkBuilder($content){
            echo "<div class='alert alert-success'><a href='$content'>$content</a></div>";
        }
            
    ?>
</div>

    
    
</body>
</html>