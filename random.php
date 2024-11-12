<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (isset($_GET["translation"]) && !empty($_GET["translation"])) {
    $trans = trim(htmlspecialchars($_GET["translation"]));
} else {
    die("Тут нечего делать");
}

define('APPLICATION', true);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json; charset=utf-8');

require_once "class-just-bible.php";

$bible = new Bible($trans);
echo json_encode($bible->getRandomVerse());
exit;
