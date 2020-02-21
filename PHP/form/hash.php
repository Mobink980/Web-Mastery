<?php
echo "<link rel='stylesheet' href='bootstrap.min.css' >";

$password = "BonjourMonsieur";
$rand = rand(10, 40); //save this random number somewhere

for($i = 0; $i < $rand; $i++){ //Apply the md5 algorithm on the string $rand iterations
    $password = md5($password);
}

echo $password;
$hashed_pwd =  password_hash($password, PASSWORD_DEFAULT); //hash the password gotten from the user and applied several md5 on it 
$pwdCheck = password_verify($password, $hashed_pwd); //check whether the hashed password can be verified

if($pwdCheck){ //if password matches
    echo "<div class='alert alert-info'>Password matches!!</div>";
}else{
    echo "<div class='alert alert-danger'>Identification required!!</div>";
}
