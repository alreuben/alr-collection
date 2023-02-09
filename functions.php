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
 * @return string 'Valid' if all the inputs are valid and 'Invalid' if more than one field is invalid
 */
function validateFormInput(string $name, string $year, string $developer, string $imdb_rating, string $image_url): string
{
    $validName = filter_var($name, FILTER_SANITIZE_STRING);
    $validName = preg_match('/^[a-zA-Z0-9 ]{1,255}$/', $name);

    $validYear = filter_var($year, FILTER_SANITIZE_NUMBER_INT);
    $validYear = filter_var($year, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1000, "max_range" => 2023]]);

    $validDeveloper = filter_var($developer, FILTER_SANITIZE_STRING);
    $validDeveloper = preg_match('/^[a-zA-Z ]{1,255}$/', $developer);

    $validImdb_rating = filter_var($imdb_rating, FILTER_SANITIZE_NUMBER_FLOAT);
    $validImdb_rating = filter_var($imdb_rating, FILTER_VALIDATE_FLOAT, ["options" => ["min_range" => 1.0, "max_range" => 10.0]]);

    $validImage_url = filter_var($image_url, FILTER_SANITIZE_URL);
    $validImage_url = filter_var($image_url, FILTER_VALIDATE_URL);

    if ($validName && $validYear && $validDeveloper && $validImdb_rating && $validImage_url) {
        return 'Valid';
    } elseif($validName && $validYear && $validDeveloper && $validImdb_rating &&! $validImage_url) {
        return 'Invalid URL';
    } elseif($validName && $validYear && $validDeveloper && $validImage_url &&! $validImdb_rating) {
        return 'Invalid rating'; // turn to float??
    } elseif($validName && $validYear && $validImdb_rating && $validImage_url &&! $validDeveloper) {
        return 'Invalid Developer name. A-Z only';
    } elseif($validName && $validDeveloper && $validImdb_rating && $validImage_url &&! $validYear) {
        return 'Invalid year';
    } elseif($validYear && $validDeveloper && $validImdb_rating && $validImage_url &&! $validName) {
        return 'Invalid Game name. Please remove special characters';
    } else {
        return 'Invalid';
    }
}

/**
 * adds a new game to the  games Db
 *
 * @return PDO the db connection
 */
//function addGameToDb(PDO $db): array
//{
//    $stmt = $db->prepare("SELECT `name`, `year`, `developer`, `imdb_rating`, `image_url` FROM `games`;");
//  bind params
//    $stmt->execute();
//    return $stmt->fetchAll();
//}

//function addNewGame(PDO $db, string $addGame): string
//{
//    $addGame = $_POST['name'] .= $_POST['year'] .= $_POST['developer'].= $_POST['imdb_rating'].= $_POST['image_url'];
//    return $addGame;
//}