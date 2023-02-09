<?php
require_once 'functions.php';
$db = createDbConnection();
$games = retrieveGamesDb($db);
//$newGame = addNewGame($db, $addGame)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Games Collection</title>
    <link rel="stylesheet" href="normalize.css" type="text/css"/>
    <link rel="stylesheet" href="styles.css" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
</head>
<body>
<header>
    <h1>Add New Game</h1>
</header>

<section class="formSection">
    <div>
        <form action="formLogic.php" method="post">
            <div>
                <label for="name">Name of Game: </label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="year">Year Released: </label>
                <input type="text" id="year" name="year">
            </div>
            <div>
                <label for="developer">Game Developer: </label>
                <input type="text" id="developer" name="developer">
            </div>
            <div>
                <label for="imbd_rating">IMBD Rating: </label>
                <input type="text" id="imbd_rating" name="imdb_rating">
            </div>
            <div>
                <label for="image_url">Image URL: </label>
                <input type="text" id="image_url" name="image_url">
            </div>
            <input type="submit" id="submitButton" value="Add New Game">
        </form>
    </div>
</section>
</body>
</html>