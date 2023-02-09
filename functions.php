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
    $stmt = $db->prepare("SELECT `name`, `year`, `developer`, `imdb_rating`, `image_url` FROM `games`;");
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

/**
 * validate form inputs
 *
 * @param string $name
 * @param string $year
 * @param string $developer
 * @param string $imdb_rating
 * @param string $image_url
 * @return bool  true if all form inputs are valid, false if not
 */
function validateFormInput(string $name, string $year, string $developer, string $imdb_rating, string $image_url): bool
{
    $validName = filter_var($name, FILTER_SANITIZE_STRING);
    $validName = preg_match('/^[A-Za-z0-9:]+( [A-Za-z0-9:]+){1,255}$/', $name);

    $validYear = filter_var($year, FILTER_SANITIZE_NUMBER_INT);
    $validYear = filter_var($year, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1000, "max_range" => 2023]]);

    $validDeveloper = filter_var($developer, FILTER_SANITIZE_STRING);
    $validDeveloper = preg_match('/^[A-Za-z]+( [A-Za-z]+){1,255}$/', $developer);

    $validImdb_rating = filter_var($imdb_rating, FILTER_SANITIZE_NUMBER_FLOAT);
    $validImdb_rating = filter_var($imdb_rating, FILTER_VALIDATE_FLOAT, ["options" => ["min_range" => 1.0, "max_range" => 10.0]]);

    $validImage_url = filter_var($image_url, FILTER_SANITIZE_URL);
    $validImage_url = filter_var($image_url, FILTER_VALIDATE_URL);

    if ($validName && $validYear && $validDeveloper && $validImdb_rating && $validImage_url) {
        return true;
    }
    return false;
}

/**
 * adds a new game to the  games Db
 *
 * @param PDO $db
 * @param string $newGameName
 * @param string $newGameYear
 * @param string $newGameDeveloper
 * @param string $newGameImdb_rating
 * @param string $newGameImage_url
 * @return bool
 */
function addGameToDb(PDO $db, string $newGameName, string $newGameYear, string $newGameDeveloper, string $newGameImdb_rating, string $newGameImage_url): bool
{
    $stmnt = $db->prepare("INSERT INTO `games` (`name`, `year`, `developer`, `imdb_rating`, `image_url`) VALUES 
    (:newGameName, :newGameYear, :newGameDeveloper, :newImdb_rating, :newImage_url);");
    $stmnt->bindParam(':newGameName', $newGameName);
    $stmnt->bindParam(':newGameYear', $newGameYear);
    $stmnt->bindParam(':newGameDeveloper', $newGameDeveloper);
    $stmnt->bindParam(':newImdb_rating', $newGameImdb_rating);
    $stmnt->bindParam(':newImage_url', $newGameImage_url);
    return $stmnt->execute();
}