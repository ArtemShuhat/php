<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$text = "пример текста: слово123, $слово213: слово2323, слово3111: еще слово9.";

$pat= '/(?<!\$)\w+(?=:)/u';

if (preg_match_all($pat, $text, $matches)) {
    foreach ($matches[0] as $match) {
        echo $match . "\n";
    }
} else {
    echo "не найдено";
}
?>
</body>
</html>