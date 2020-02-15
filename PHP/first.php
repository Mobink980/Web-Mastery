<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
<?php
define("COUNTRY","Iran"); //defining a constant

echo "<h2 style='font-weight:700; text-align:center;'>Some PHP facts!</h2>";
$num1 = 10;
$num2 = 10.00;
echo "<br/>";
var_dump($num1 == $num2); //They are the same number
var_dump($num1 === $num2); //But they are not exactly the same (one of them is float and the other integer)

$cars = array("Audi", "Benz", "Bugatti", "Peykan", "Pride");

echo "<h4>The best automobile ever is <span style='color:red;'>$cars[4]</span> </h4>";
echo "It is perfectly better than:";
echo "<ul>";
for($i = 0; $i < count($cars) - 1; $i++){
    echo "<li>$cars[$i]</li>";
}
echo "</ul>";
//if two keys in associative array are equal, then the last value is assigned to the key
$person = array("Maziear" =>23, "Mohammad" =>33, "Mahdi" => 40);//associative array (key => value)
echo "<p>The age of Maziear is ".$person["Maziear"]. "</p>";

class Car{
    public $color = "blue";
    public $status = "off";
    public $make = "Ford";

    //This method will change the status of the car
    public function turn_on(){
        $this -> status = "on";
    }

    //Returns the name of the car
    public function name(){
        return $this -> make;
        }
}

$car = new Car(); //create an instance of the class
echo $car -> name(); //use it to run one of its methods

$textfile = fopen("text1.txt", "r");
?>

<div class="alert alert-warning" style="direction: rtl; text-align:right; width: 100%; margin-right:10px !important; font-weight:800; font-family:'B Yekan'; font-size:20px;">
<?php
    echo fread($textfile, filesize("text1.txt"));//read all the characters from the text file
?>
</div>

<?php
$text = "This is a very beautiful and awesome text!! It's beautiful!!";
$length = strlen($text);
$words = str_word_count($text);
echo "The length of string '".$text . "' is :".$length;
echo "<br/> The number of words are: ".$words;
echo "<br/> The reverse text is: ".strrev($text);
echo "<br/> The position of word in this text is: ".strpos($text, "beautiful");
echo "<br/> Replacing beautiful with nice: ".str_replace("beautiful", "nice", $text);
echo "Converting a string to an array by explode() function:<br />";
print_r(explode(" ", $text)); //Getting an array of words from a string
echo "<br />";
// 0 ==> array with one element
// -n ==> array with all elements except the last n element (n member of 1, 2, 3, ...)
print_r(explode(" ", $text, 3)); //Getting an array of words from a string (only 3 elements)
echo "Converting an array to a string by implode() method:<br />";
$arr = explode(" ", $text);
$str = implode(" %% ", $arr);
echo $str;

echo "<br />Removing white spaces with trim() method:<br />";
$str1 = "Hi      What is up?!   bonsoir Monsieur!!";
$modified_str1 = trim($str1);
echo "$modified_str1<br />";
$encrypted_str = md5($modified_str1);
echo "<br />Encrypted string is: " . $encrypted_str;
echo "<br />";
$course = "Ruby";
switch($course){ //if a case does not have break, it will run all the conditions until seeing first break
    case("Go"):
        echo "Learning Go";
    break;

    case("Swift"):
        echo "Learning Swift";
    break;

    case("Ajax"):
        echo "Learning Ajax";
    break;

    default: //if none of the conditions were true 
        echo "Learn whatever you want, Mon amie!";
    break;
}

echo "<br />Positive odd numbers below 20 are: ";
for($i = 0; $i < 20; $i++){
    if($i % 2 != 0){
        echo $i." ";
    }
}

$list = array("PHP", "Go", "Swift", "Python", "C & C++", "C#", "Java", "R", "Ruby", "Perl");
echo "<br /> Some Programming Languages are: <p style=' font-weight:500;'>";
foreach($list as $value){
    echo "<a style='color:orange;' href='#'>$value </a>";
}
echo "</p>";

function head_creator($topic){
    echo "<h5 style='font-weight:600;'>$topic</h5>";
}
function body_creator(){
    echo "Welcome to PHP learning and I'm sure that you will have a great time.";
}
function age($age){
    return "<span class='badge'>$age</span>";
}
function personality($firstname, $lastname, $age){
    $a = age($age);
    return "<div class='label label-primary' style='font-size:15px;'>$firstname $lastname $a</div>";
}
?>
<div class="col-xs-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
        <?php head_creator("PHP Education"); ?>
        </div>
        <div class="panel-body">
        <?php body_creator(); ?>
        <p>The students are:</p>
        <?php
        echo "<p>".personality("Jane", "Austin", 26) . "<p/>";
        echo "<p>".personality("James", "Pinkman", 32) . "<p/>";
        echo "<p>".personality("Mary", "Kruits", 40) . "<p/>";
        ?>

        </div>
    </div>
</div>

<div>
    <form action="first.php" method="get" style="width: 80%; margin: 0 auto;">
        <input type="text" placeholder="firstname" name="firstname"  class="form-control">
        <input type="text" placeholder="lastname" name="lastname"  class="form-control">
        <button type="submit" class="btn btn-warning btn-block">Click</button>
    </form>
    <br>
</div>
<p> $_GET is an associative array. The keys are the name of the inputs and the values are what the user writes</p>
<?php
print_r($_GET); 
if(isset($_GET["firstname"]) and isset($_GET["lastname"])){
    $firstname = $_GET["firstname"];
    $lastname = $_GET["lastname"];
    echo "<p class='alert alert-success'>We got a person with the firstname:<span style='color:red;'> $firstname</span> 
    and the lastname: <span style='color:red;'>$lastname</span>.</p>";
}else{
    echo 'User is undefined';
}
?>
<div>
    <form action="first.php" method="post" style="width: 80%; margin: 0 auto;">
        <input type="password" placeholder="Password" name="password"  class="form-control">
        <button type="submit" class="btn btn-info btn-block">Enter</button>
    </form>
    <br>
</div>
<?php
print_r($_POST); 
if(isset($_POST["password"])){
    $password = $_POST["password"];
}else{
    echo 'Password is undefined';
}




