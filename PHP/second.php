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
$arr = array();
$arr1 = array_fill(0, 5, "PHP");
$arr2 = array_fill(0, 5, "NodeJs");
$arr3 = array_merge($arr1, $arr2);
print_r($arr3);
for($i = 0; $i < 5; $i++){
    array_push($arr, $i+1);
}
echo "<br/>";
print_r($arr);
echo "<br/> The product is: ".array_product($arr); //Getting the product of an array
echo "<br/> The sum is: ".array_sum($arr); //Getting the product of an array
echo "<br/>";
$number = array_pop($arr);
echo "The popped element is <span class='badge'>$number</span>" ;
$reversedArr = array_reverse($arr, true);
echo "<br/>The reversed array is: ";
print_r($reversedArr);

$strArr = array("Maziear" => "Mousavi", "Anna" => "Myers", "Claudia" => "Perret", "James" => "Patterson",
 "Jennifer" => "Arson", "Antonio" => "Gerhard");
$values = array_values($strArr); //getting the values of the array arr
$keys = array_keys($strArr); //getting the keys of the values arr

echo "<br/>The array is: <br/>";
print_r($strArr);
echo "<br/>The keys are: <br/>";
print_r($keys);
echo "<br/>The values are: <br/>";
print_r($values);
echo "<br/>A subarray of the Last names is:<br/>";
print_r(array_slice($values, 1, 4));
echo "<br/>";
if(in_array("Mousavi", $strArr)){ //The evaluation is in the values not the keys
    echo "Mousavi does exist in the array";
}
else{
    echo "Mousavi does not exist in the array";
}
echo "<br/>";
//The look for the keys in the array we use
if(array_key_exists("Maziear", $strArr)){ //The evaluation is in the values not the keys
    echo "Maziear does exist in the keys";
}
else{
    echo "Maziear does not exist in the keys";
}

echo "<br/>"."Previous: ". prev($strArr) ."<br/>";
echo "current: ". current($strArr)."<br/>";
echo "next: ". next($strArr) ."<br/>";
echo "first: ". reset($strArr) ."<br/>"; //sending the pointer to the first
echo "end: ". end($strArr) ."<br/>"; //sending the pointer to the last
?>
<form action="second.php" method="post">
    <h5>Write your email & comment :-)</h5>
    <h6>Try this: &lt;script&gt;window.location.assign('https:\\www.google.com');&lt;/script&gt;</h6>
    
    <input type="text" class="form-control" name="content" placeholder="Comment">
</form>
<form action="second.php" method="post">
    <input type="text" class="form-control" name="email" placeholder="Email">
</form>
<form action="second.php" method="post">
    <input type="text" class="form-control" name="url" placeholder="URL">
</form>
<?php
if(isset($_POST['content'])){
    $comment = $_POST['content'];
    $comment = filter_var($comment, FILTER_SANITIZE_STRING); //Empty the string from destructive codes
    echo "<div id='master' class='alert alert-info'>$comment</div><br/>";
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); //Empty the email from destructive codes
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //validate the email
        echo   "<div class='alert alert-success'>$email is valid.</div>";
    
    }else{
        echo  "<div class='alert alert-danger'>$email is not valid.</div>";
    }
    echo "<div id='hero' class='alert alert-primary'>$email</div>";
}

if(isset($_POST['url'])){
    $url = $_POST['url'];
    $url = filter_var($url, FILTER_SANITIZE_URL); //Empty the email from destructive codes
    if(filter_var($url, FILTER_VALIDATE_URL)){ //validate the email
        echo   "<div class='alert alert-success'>$url is valid.</div>";
    
    }else{
        echo  "<div class='alert alert-danger'>$url is not valid.</div>";
    }
    echo "<div id='hero' class='alert alert-warning'>$url</div>";
}
