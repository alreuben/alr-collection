<?php
/**
 * Creates a Db connection
 *
 * @return PDO the db connection
 */
function createDbConnection(): PDO
{
    $db = new PDO('mysql:host=db; dbname=alr_games', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * retrieves all data from games Db
 *
 * @return array - all the games and stats
 */
function retrieveGamesDb(PDO $db): array
{
    $stmt = $db->prepare("SELECT `name`, `year`, `developers`, `imdb_rating`, `image_url` FROM `games`");
    $stmt->execute();
    return $stmt->fetchAll();
}
