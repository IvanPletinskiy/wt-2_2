<?php

$text = "";
if (isset($_POST["text"])) {
    $text = htmlspecialchars($_POST["text"]);
} else {
    $text = "";
}

$words_array = explode(" ", $text);
for ($i = 0; $i < sizeof($words_array); $i++) {
    if ($i % 2 == 0 && $i != 0) {
        $words_array[$i] = strtoupper($words_array[$i]);
    }
}

$lowerCaseOCount = 0;
$upperCaseOCount = 0;
for ($i = 0; $i < strlen($text); $i++) {
    if ($text[$i] == 'o') {
        $lowerCaseOCount++;
    }
    if ($text[$i] == 'O') {
        $upperCaseOCount++;
    }
}

function build_formatted_string(array $words)
{
    if (sizeof($words) == 0) {
        return "";
    }
    $formatted_words = [];
    for ($i = 0; $i < sizeof($words); $i++) {
        if (strlen($words[$i]) > 2) {
            $word = substr($words[$i], 0, 2) . '<span style="color:purple">' . $words[$i][2] . '</span>';
        } else {
            $word = $words[$i];
        }
        if (strlen($words[$i]) > 3) {
            $word .= substr($words[$i], 2, -1);
        }
        $formatted_words[] = $word;
    }
    return join(" ", $formatted_words);
}

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/wt-2/styles.css">
    <meta charset="UTF-8">
    <title>WT-2</title>
</head>
<body>
    <div>
        <form action="/wt-2/second_task.php" method="post">
            <p>Введите текст: <input name="text"/></p>
            <p><input type="submit"/></p>
        </form>
        <div>
            <h1>Форматированная строка:' . build_formatted_string($words_array) . '</h1>
            <h1>Всего о:' . $lowerCaseOCount . '</h1>
            <h1>Всего О:' . $upperCaseOCount . '</h1>
        </div>
    </div>
</body>
</html>';
