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
    $stmt = $db->prepare('SELECT `name`, `year`, `developer`, `imdb_rating`, `image_url` FROM `games`;');
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Displays each game from the games array into an individual HTML block
 *
 * @param array $games
 * @return string of each game and their stats
 */
function displayGames(array $games): string
{
    $result = '';
    foreach ($games as $game) {
        if (array_key_exists('image_url', $game)
            && array_key_exists('name', $game)
            && array_key_exists('year', $game)
            && array_key_exists('developer', $game)
            && array_key_exists('imdb_rating', $game)
        ) {
            $result .= '<article class="collectionContainer">
            <img src="' . $game['image_url'] . '">
            <div class="collectionStats">
                <h2>' . $game['name'] . '</h2>
                <p>' . $game['year'] . '</p>
                <p>' . $game['developer'] . '</p>
                <p>' . $game['imdb_rating'] . '</p>
            </div>
        </article>';
        }
    }
    return $result;
}


