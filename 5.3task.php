<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$birth_years = array(
    "Иванов" => 1980,
    "Петров" => 1995,
    "Сидоров" => 1985,
    "Андреев" => 2000,
);

// По ключам (в алфавитном порядке)
ksort($birth_years);
echo "Сортировка по ключам (в алфавитном порядке):\n";
print_r($birth_years);
echo "<br>";

// По значениям (по возрастанию)
asort($birth_years);
echo "Сортировка по значениям (по возрастанию):\n";
print_r($birth_years);
echo "<br>";

// Оригинальный порядок
echo "Оригинальный порядок:\n";
print_r($birth_years);
?>
</body>
</html>