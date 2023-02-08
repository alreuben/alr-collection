<?php
require_once 'functions.php';
$db = createDbConnection();
$games = retrieveGamesDb($db);
$gamesHtml = displayGames($games);
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
<nav>
    <div>
        <h3><a href="#" class="navLogo">RBN</a></h3>
    </div>
    <div class="navRight">
        <button>Add New Game</button>
    </div>
</nav>

<header>
    <h1>Games Collection</h1>
</header>


<main>
    <section class="collection">
        <?php echo $gamesHtml; ?>
</section>
</main>

<footer>
    <section>
        <p>© Copyright Ayannah Reuben 2023</p>
    </section>
</footer>



</body>
</html>