<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ayannah's Games Collection</title>
    <link rel="stylesheet" href="styles.css" type="text/css"/>
</head>
<body>
<nav>
    <div class="navLeft">
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
<p>test</p>

</header>


<main>
<?php
require_once 'functions.php';

$db = createDbConnection();
$games = retrieveGamesDb($db);


echo '<pre>';
var_dump($games);
echo '</pre>';
?>


</main>
</body>
</html>