<?php
function createDbConnection(): PDO
{
    $db = new PDO('mysql:host=db; dbname=alr_games', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

function retrieveGamesDb(PDO $db): array
{
    $stmt = $db->prepare("SELECT `name`, `year`, `developers`, `imdb_rating`, `image_url` FROM `games`");
    $stmt->execute();
    return $stmt->fetchAll();
}
