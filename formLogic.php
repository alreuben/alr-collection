<?php

require_once 'functions.php';

if(!isset($_POST['name']) && !isset($_POST['year']) && !isset($_POST['developer']) && !isset($_POST['imdb_rating']) && !isset($_POST['image_url'])) {
    header('Location: index.php');
}

$name = $_POST['name'];
$year = $_POST['year'];
$developer = $_POST['developer'];
$imdb_rating = $_POST['imdb_rating'];
$image_url = $_POST['image_url'];
$validInput = validateFormInput($name, $year, $developer , $imdb_rating, $image_url);

if($validInput) {
    $db = createDbConnection();
    $addNewGame = addGameToDb($db, $name, $year, $developer , $imdb_rating, $image_url);
}

header('Location: index.php');