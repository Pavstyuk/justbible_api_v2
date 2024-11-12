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


if (isset($_GET["book"]) && !empty($_GET["book"])) {
    $book = (int)trim(htmlspecialchars($_GET["book"]));
} else {
    $book = null;
}

if (isset($_GET["chapter"]) && !empty($_GET["chapter"])) {
    $chapter = (int)trim(htmlspecialchars($_GET["chapter"]));
} else {
    $chapter = null;
}

if (isset($_GET["verse"]) && !empty($_GET["verse"])) {
    $verse = (int)trim(htmlspecialchars($_GET["verse"]));
} else {
    $verse = null;
}

if (isset($_GET["verses"]) && !empty($_GET["verses"])) {
    $verses_get = trim(htmlspecialchars($_GET["verses"]));
    if (str_contains($verses_get, ",")) $verses = explode(",", $verses_get);
    if (str_contains($verses_get, "-")) {
        $verses = array();
        $verses_span_arr = explode("-", $verses_get);
        if (isset($verses_span_arr) && count($verses_span_arr) === 2) {
            if ((int)$verses_span_arr[0] > 0 && (int)$verses_span_arr[0] < (int)$verses_span_arr[1])
                for ($i = (int)$verses_span_arr[0]; $i <= (int)$verses_span_arr[1]; $i++) {
                    array_push($verses, $i);
                }
        } else {
            $verses = null;
        }
    }
} else {
    $verses = null;
}


require_once "class-just-bible.php";

$bible = new Bible($trans);

if ($book && $chapter && isset($verses) && count($verses) > 0) {
    $result = $bible->getVerses($book, $chapter, $verses) + array('info' => $bible->getInfo());
    echo json_encode($result);
    exit;
}
if ($book && $chapter && $verse) {
    $result = $bible->getVerse($book, $chapter, $verse) + array('info' => $bible->getInfo());
    echo json_encode($result);
    exit;
}
if ($book && $chapter) {
    $result = $bible->getChapter($book, $chapter) + array('info' => $bible->getInfo());
    echo json_encode($result);
    exit;
}
if ($book) {
    $result = $bible->getBook($book) + array('info' => $bible->getInfo());
    echo json_encode($result);
    exit;
} else {
    $result = $bible->getFullBible() + array('info' => $bible->getInfo());
    echo json_encode($result);
    exit;
}
