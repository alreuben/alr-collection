<?php
require_once 'functions.php';
echo '<pre>';
var_dump($_POST['name']);
var_dump($_POST['year']);
var_dump($_POST['developer']);
var_dump($_POST['imdb_rating']);
var_dump($_POST['image_url']);
echo '</pre>';


$name = $_POST['name'];
$year = $_POST['year'];
$developer = $_POST['developer'];
$imdb_rating = $_POST['imdb_rating'];
$image_url = $_POST['image_url'];
$validInput = validateFormInput($name, $year, $developer , $imdb_rating, $image_url);

echo $validInput;
?>

<!--//$addGame = "INSERT INTO `games` (`name`, `year`, `developer`, `imdb_rating`, `image_url`)-->
<!--//VALUES ('$name', '$year', '$developer','$imdb_rating', '$image_url')";-->