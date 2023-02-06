
<body>
<?php
require_once 'functions.php';
include 'styles.css';

$db = createDbConnection();
$stmt = retrieveGamesDb($db);


echo '<pre>';
var_dump($stmt);
echo '</pre>';

</html>