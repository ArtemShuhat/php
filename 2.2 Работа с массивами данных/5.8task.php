<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$englishToUkrainian1 = [
    "apple" => "яблуко",
    "banana" => "банан",
    "cherry" => "вишня",
    "orange" => "апельсин",
    "lemon" => "лимон"
];

$englishToUkrainian2 = [
    "grape" => "виноград",
    "strawberry" => "полуниця",
    "watermelon" => "кавун",
];

$mergedDictionary = array_merge($englishToUkrainian1, $englishToUkrainian2);
print_r($mergedDictionary);
    ?>
</body>
</html>