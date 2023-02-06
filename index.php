<?php
require_once 'functions.php';

$db = createDbConnection();
$stmt = retrieveGamesDb();


echo '<pre>';
var_dump($stmt);
echo '</pre>';