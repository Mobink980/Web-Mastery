<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php

echo "<div class='alert alert-info'><strong>Object Oriented Programing in PHP</strong></div>";
class Product{
    //All methods and properties are defined here
    //Access Modifiers ==> The levels which we are allowed to access the methods and properties of a class 
    //Access Modifiers include public, private, protected

    //we define these variables private for type check mechanism to assure the values given by users are valid
    //we define a variable public if and only if it is proven that we need it public
    private $name; 
    private $price;
    private $desc;

    private $count; //cannot access private objects out of the class

    public function getInfo(){
        return $this -> name;
    }

    //__construct will run whenever we create an instance of this class
    //we give these arguments some initial value, so we can make instance without them
    function __construct($name = "Product Management", $price = "$12", $desc = "Learning about management of products") 
    {
        $this -> name = $name;
        $this -> price = $price;
        $this -> desc = $desc;
    }
}

echo "<div class='container'>";
$book1 = new Product(); //Create an object of the class Product
$book2 = new Product("An Introduction to Algorithm Design","$10", "Learn about Algorithms"); //Create an object of the class Product
$book3 = new Product("Speech Recognition", "$13", "Learn about speech recognition"); //Create an object of the class Product
$book4 = new Product("Computer Vision", "$20", "Learn about computer vision"); //Create an object of the class Product

// $book1 -> name = "An Introduction to Algorithm Design";
printContent($book1 ->getInfo()); //printing the variable name 
printContent($book2 ->getInfo()); //printing the variable name 
printContent($book3 ->getInfo()); //printing the variable name 
printContent($book4 ->getInfo()); //printing the variable name 





function printContent($content){
    echo "<div class='alert alert-dark'>$content</div>";
}





echo "</div>";