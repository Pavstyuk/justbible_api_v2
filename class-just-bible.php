<?php
class Bible
{
    public $bible;
    public $translation;
    public $books;
    public $book_key;
    public $chapter_number;
    public $verse_number;
    public $verses_number;

    function __construct($translation = "rbo")
    {
        $this->translation = $translation;

        $files = array(
            "rbo" => __DIR__ . "/json/rbo.json",
            "rst" => __DIR__ . "/json/rst.json",
            "nasb" => __DIR__ . "/json/nasb.json",
        );
        if (isset($files[$this->translation])) {
            $path =  $files[$this->translation];
        } else {
            echo json_encode(array("status" => "false", "error" => "Translation name error {$this->translation} is invalid"));
            exit;
        }
        $this->bible = json_decode(file_get_contents($path), TRUE);
        $books_en = ["Genesis", "Exodus", "Leviticus", "Numbers", "Deuteronomy", "Joshua", "Judges", "Ruth", "1 Samuel", "2 Samuel", "1 Kings", "2 Kings", "1 Chronicles", "2 Chronicles", "Ezra", "Nehemiah", "Esther", "Job", "Psalms", "Proverbs", "Ecclesiastes", "Song of Solomon", "Isaiah", "Jeremiah", "Lamentations", "Ezekiel", "Daniel", "Hosea", "Joel", "Amos", "Obadiah", "Jonah", "Micah", "Nahum", "Habakkuk", "Zephaniah", "Haggai", "Zechariah", "Malachi", "Matthew", "Mark", "Luke", "John", "Acts", "Romans", "1 Corinthians", "2 Corinthians", "Galatians", "Ephesians", "Philippians", "Colossians", "1 Thessalonians", "2 Thessalonians", "1 Timothy", "2 Timothy", "Titus", "Philemon", "Hebrews", "James", "1 Peter", "2 Peter", "1 John", "2 John", "3 John", "Jude", "Revelation"];
        $books_ru = ["Бытие", "Исход", "Левит", "Числа", "Второзаконие", "Иисус Навин", "Судьи", "Руфь", "1 Царств", "2 Царств", "3 Царств", "4 Царств", "1 Паралипоменон", "2 Паралипоменон", "Ездра", "Неемия", "Есфирь", "Иов", "Псалтирь", "Притчи", "Екклесиаст", "Песня Песней", "Исаия", "Иеремия", "Плач Иеремии", "Иезекииль", "Даниил", "Осия", "Иоиль", "Амос", "Авдий", "Иона", "Михей", "Наум", "Аввакум", "Софония", "Аггей", "Захария", "Малахия", "Матфей", "Марк", "Лука", "Иоанн", "Деяния", "Иаков", "1 Петра", "2 Петра", "1 Иоанна", "2 Иоанна", "3 Иоанна", "Иуда", "Римлянам", "1 Коринфянам", "2 Коринфянам", "Галатам", "Ефесянам", "Филиппийцам", "Колоссянам", "1 Фессалоникийцам", "2 Фессалоникийцам", "1 Тимофею", "2 Тимофею", "Титу", "Филимону", "Евреям", "Откровение"];
        if ($this->translation === "nasb") {
            $this->books = $books_en;
        } else {
            $this->books = $books_ru;
        }
    }

    function getTranslationName()
    {
        return $this->translation;
    }

    function getBooksNames()
    {
        return $this->books;
    }

    function getBookName($book_index)
    {
        if (!empty($this->books[$book_index - 1])) {
            $book_key = $this->books[$book_index - 1];
            $this->book_key = $book_key;
        } else {
            echo json_encode(array("status" => "false", "error" => "Book number error. Valid values integer 1 - 66"));
            exit;
        }
        return $this->book_key;
    }

    function getFullBible()
    {
        return $this->bible;
    }

    function getBook($book_index)
    {
        return $this->bible[$this->getBookName($book_index)];
    }

    function getChapter($book_index, $chapter_number)
    {
        $book = $this->getBook($book_index);
        if (!empty($book[$chapter_number])) {
            $this->chapter_number = $chapter_number;
            $chapter = $book[$chapter_number];
        } else {
            echo json_encode(array("status" => "false", "error" => "Chapter number error. $chapter_number is invalid for book {$this->getBookName($book_index)}"));
            exit;
        }

        return $chapter;
    }

    function getVerse($book_index, $chapter_number, $verse_number)
    {
        $chapter =  $this->getChapter($book_index, $chapter_number);
        if (!empty($chapter[$verse_number])) {
            $this->verse_number = $verse_number;
            $verse[$verse_number] = $chapter[$verse_number];
        } else {
            echo json_encode(array("status" => "false", "error" => "Verse number error. Verse number $verse_number is invalid for chapter number $chapter_number of book {$this->getBookName($book_index)}"));
            exit;
        }
        return $verse;
    }

    function getVerses(int $book_index = 1, int $chapter_number = 1, array $verses_number = array(1))
    {
        $chapter =  $this->getChapter($book_index, $chapter_number);

        foreach ($verses_number as $verse_num) {
            if (!empty($chapter[$verse_num])) {
                $verses[$verse_num] = $chapter[$verse_num];
            } else {
                $verses[$verse_num] = null;
                echo json_encode(array("status" => "false", "error" => "Verses number error. Verses numbers $verse_num is invalid for chapter number $chapter_number of book {$this->getBookName($book_index)}"));
                exit;
            }
        }

        $this->verses_number = $verses_number;

        return $verses;
    }

    function getInfo()
    {
        $info_arr = array(
            "translation" => $this->translation,
        );
        if ($this->book_key) $info_arr['book'] = $this->book_key;
        if ($this->chapter_number) $info_arr['chapter'] = $this->chapter_number;
        if ($this->verse_number) $info_arr['verse'] = $this->verse_number;
        if ($this->verses_number) $info_arr['verse'] = implode(",", $this->verses_number);

        return $info_arr;
    }

    function getRandomVerse()
    {
        $rnd_book_index = random_int(1, 66);
        $book = $this->getBook($rnd_book_index);

        $rnd_verse_chapter = random_int(1, count($book));
        $chapter = $this->getChapter($rnd_book_index, $rnd_verse_chapter);

        $rnd_verse_index = random_int(1, count($chapter));
        $verse = $this->getVerse($rnd_book_index, $rnd_verse_chapter, $rnd_verse_index);

        if ($verse) {
            return array("verse" => $verse[$rnd_verse_index], "info" => "{$this->getBookName($rnd_book_index)} $rnd_verse_chapter:$rnd_verse_index");
        }
    }

    function searchInBible($query)
    {
        if ($query === null || mb_strlen($query) < 3) {
            $info = array(
                "status" => false,
                "error" => "Search query is too short",
            );
            return $info;
        }

        $results = array();

        $count = 0;

        foreach ($this->bible as $book_name => $book) {
            foreach ($book as $chap_num => $chapter) {
                foreach ($chapter as $verse_num => $text) {
                    if (str_contains(strtolower($text), strtolower($query))) {
                        $arr = array(
                            "text" => $text,
                            "data" => "$book_name $chap_num:$verse_num",
                        );
                        array_push($results, $arr);
                        $count++;
                    }
                }
            }
        }

        $data = array(
            "info" => array(
                "searched" => $query,
                "count" => $count,
            )
        );

        return $results + $data;
    }
}
