<?php
require_once 'functions.php';
$db = createDbConnection();
$games = retrieveGamesDb($db);
$gamesHtml = displayGames($games);
//echo '<pre>';
//var_dump($games);
//echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ayannah's Games Collection</title>
    <link rel="stylesheet" href="normalize.css" type="text/css"/>
    <link rel="stylesheet" href="styles.css" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
</head>
<body>
<nav>
    <div>
        <h3><a href="#" class="navLogo">RBN</a></h3>
    </div>
    <div class="navMiddle">
        <h1><a href="#collection">Games Collection</a></h1>
    </div>
    <div class="navRight">
        <a href="#add">Add</a>
        <a href="#delete">Delete</a>
    </div>
</nav>



<header>

</header>


<main>
    <section class="collection">
        <?php echo $gamesHtml; ?>
<!--        <article class = "collectionContainer">-->
<!--            <img src = "https://upload.wikimedia.org/wikipedia/en/thumb/1/15/The_Elder_Scrolls_V_Skyrim_cover.png/220px-The_Elder_Scrolls_V_Skyrim_cover.png">-->
<!--            <div class = "collectionStats">-->
<!--                <h2>name</h2>-->
<!--                <p>year</p>-->
<!--                <p>developer</p>-->
<!--                <p>imdb_rating</p>-->
<!--            </div>-->
<!--        </article>-->


<!---->
<!--<article class="collectionContainer">-->
<!--        <img src="" />-->
<!--    <div class="collectionStats">-->
<!--        <h2>--><?php //echo $games['name'] ?><!--</h2>-->
<!--        <p>--><?php //echo $games["year"] ?><!--</p>-->
<!--        <p>--><?php //echo $games["developers"] ?><!--</p>-->
<!--        <p>--><?php //echo $games["imbd_rating"] ?><!--</p>-->
<!--    </div>-->
<!--</article>-->

</section>
</main>

<footer>
    <section>
        <p>© Copyright Ayannah Reuben 2023</p>
    </section>
</footer>



</body>
</html>