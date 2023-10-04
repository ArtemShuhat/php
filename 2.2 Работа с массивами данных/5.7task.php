<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$englishToUkrainian = [
    "apple" => "яблуко",
    "banana" => "банан",
    "cherry" => "вишня",
    "orange" => "апельсин",
    "lemon" => "лимон",
];

$ukrainianToEnglish = array_flip($englishToUkrainian);

foreach ($ukrainianToEnglish as $key => $value) {
    if (is_array($value)) {
        $ukrainianToEnglish[$key] = array_flip($value);
    }
}

echo "Англо-український словник:\n";
print_r($englishToUkrainian);
echo "<br>";
echo "\nУкраинско-английский словарь:\n";
print_r($ukrainianToEnglish);
    ?>
</body>
</html>