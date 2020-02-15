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
    <?php
        $date1 = date("l d-M-Y h:i:s a"); //h:0 to 12  H:0 to 24
        $date2 = date("L j m y H:i:s A");
        echo "<div class='alert alert-info'>$date1</div>";
        echo "<div class='alert alert-warning'>$date2</div>";
        $timestamp = time(); //number of seconds from the January's 1st 1970
        $years = (($timestamp/3600)/24)/365;
        $timestampToToday = date('j F Y h:i:s A', $timestamp);
        $todayToTimestamp = mktime(23,45,3,11,23,2018);
        $tenYearLater = date("Y") + 10;
        echo "<div class='alert alert-success'> Seconds from January's 1st 1970: <span style='color: red;'>$timestamp</span>  
        <br/>Years from January's 1st 1970: <span style='color: red;'>$years</span>
        <br/>10 years later is: <span style='color: red;'>$tenYearLater</span>
        <br/> <span style='color: red;'>$timestampToToday</span>
        <br/> <span style='color: red;'>$todayToTimestamp</span></div>"; 
        //Using the global variable within the function
        $x = 10;
        $y = 20;
        function sum(){
            global $x, $y;
            echo $x + $y;
        }

        function nextValue(){
            static $value = 0; //defining it as static so it wont be redefined every time the function is called
            $value++;
            echo $value ." ";
        }
        echo "x = $x & y = $y <br/>";

        for($i = 0; $i < 10; $i++){
            nextValue();
        }
        $str = "Welcome to <strong>PHP</strong> Programming.";
        $str = htmlspecialchars($str); //avoid affecting html tagss
        echo "<br/>".$str;
        $days = array("January", "February");
        $days[] = "Sunday";
        $days[] = "Monday";
        $days[] = "Tuesday";
        $days[] = "Wednesday";
        $days[] = "Thursday";
        $days[] = "Friday";
        $days[] = "Saturday";
        $days[] = "March";
        echo "<br/>";
        var_dump($days);

        $arr = [];
        $arr[0] = 0;
        $arr[1] = "شنبه";
        $arr[2] = 12.3546;
        $arr[3] = "HaHaha";
        echo "<br/>";
        var_dump($arr);
        echo "<br/>Multidimensional array<br/>";
        $persons = array("Maziear" => array("NodeJs", "Python", "Java", "Java Script", "PHP", "ASP"),
        "Ahmad" => array("C#", "Python", "Java", "Java Script", "PHP", "ASP"),
        "Marry" => array("NodeJs", "Python", "Ruby", "Java Script", "PHP", "ASP"),
        "Jennifer",
        "Jason" => array("NodeJs", "Python", "Java", "Java Script", "Perl", "ASP"),
        "Monica" => array("NodeJs", "Delphi", "Java", "Java Script", "PHP", "ASP MVC")
        );
        echo "Monica is adept at ".$persons["Monica"][count($persons["Monica"]) - 1]; //Return the last skill of Monica
        echo "<br/>";
        echo "Ahmad is very good at ".$persons["Ahmad"][1]; //Return the second skill of Ahmad

        $numbers = array(
            array(0, 1, 2, 3, 4),
            array(5, 6),
            array(7, 8, 9, 10, 11, 12, 13, 14)
        );

        echo "<br/>";
        echo $numbers[2][2]; //It will print 9

                //A function to create colors randomly
                function colorRandom(){
                    //split each character of the string and put it in array letters
                    $letters = explode(" ","0 1 2 3 4 5 6 7 8 9 A B C D E F"); 
                    $color = "#";
                    $rand = 0;
                    for($i = 0; $i < 6; $i++){
                        $rand = rand(0, 15); //find an index between 0 and 15
                        $color .= $letters[$rand]; //add the associated hex number to color
                        
                    }
                    return $color;
                }
                
        foreach($days as $day){
            $random = colorRandom();
            echo "<div style='background-color:$random;'>$day</div>";
        }
        foreach($persons as $person){
            if(is_array($person)){ //if $person is an array then do the foreach
                foreach($person as $skill){
                echo "$skill, ";
            }
            
        }else{ //if $person is not an array then print it
                echo $person;
            }
            
            echo "<br/>================================================</br>";
        }

        //declaration of an associative array
        $aboriginals = array("Mohammad" => "Mojgan", "Ramin" => "Rahim", 
        "Rasool" => "Karim", "Samane" => "Sanaz", "Narges" => "Nahid");
        //printing the keys with their values
        foreach($aboriginals as $key => $aboriginal){
            echo $key . " => " . $aboriginal . "</br>";
        }
        
    ?>
    
    
</body>
</html>