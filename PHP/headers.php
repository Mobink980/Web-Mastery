
<?php
echo "<link rel='stylesheet' href='../bootstrap-3.3.7-dist/css/bootstrap.css' >";
echo "<div class='alert alert-info'><strong>Headers and Download Files</strong></div>";

echo "<h2>Downloading Books and Papers</h2>";
echo "<hr/>";
if(isset($_GET["downloadb"]) && $_GET["downloadb"] == "book1.pdf"){

    $content = file_get_contents("books/book1.pdf"); //Reading the file
    header("Content-Type: application/pdf"); //telling the browser that the type of the file given is pdf
    echo $content;
}

if(isset($_GET["download"]) && $_GET["download"] == "book1.pdf"){

    $content = file_get_contents("books/book1.pdf"); //Reading the file
    header("Content-Type: application/pdf"); //telling the browser that the type of the file given is pdf
    //if we remove the filename part then some browsers will not recognize the type of the file
    header("Content-Disposition: attachment; filename=book1.pdf"); //attach the downloaded file and don't open it in the browser
    echo $content;
}



function printContent($content){
    echo "<div class='alert alert-dark'>$content</div>";
}





echo "</div>";


$dir = "books";
$pdf_files = scandir($dir); //return all of the contents in the $dir as an array
// var_dump($pdf_files);
for($i = 2; $i < count($pdf_files); $i++){
    echo '<a class="btn btn-link" href="books/'.$pdf_files[$i].'" download="'. $pdf_files[$i] .'">
    <span class="glyphicon glyphicon-download"> '.$pdf_files[$i].'</span></a> <br/>';
}

?>

<?php  echo "<div class='alert alert-info'>"; ?>
<div id="output1">
    <form action="down.php" method="get">
        <a class="btn btn-link" href="?downloadb=book1.pdf">Download the book in browser</a>
    </form>
</div>

<div id="output"> 
    <form action="down.php" method="get">

        <a class="btn btn-link" href="?download=book1.pdf" download="book1.pdf">Download the book and attach it to browser</a>
    </form>
</div>

<?php  echo "</div>"; ?>