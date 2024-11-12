<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (isset($_GET["translation"]) && !empty($_GET["translation"])) {
    $trans = trim(htmlspecialchars($_GET["translation"]));
} else {
    die("Тут нечего делать");
}

if (isset($_GET["search"]) && !empty($_GET["search"])) {
    $query = trim(htmlspecialchars($_GET["search"]));
} else {
    die("Отсутствует поисковый запрос");
}

define('APPLICATION', true);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json; charset=utf-8');

require_once "class-just-bible.php";

$bible = new Bible($trans);
$result = $bible->searchInBible($query);
echo json_encode($result);

exit;
