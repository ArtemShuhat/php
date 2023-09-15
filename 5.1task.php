<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$numbers = [];
for ($i = 0; $i < 5; $i++) {
    $numbers[] = rand(0, 100) / 10;
}

$min = min($numbers);
$max = max($numbers);
$sum = $min + $max;

echo "Массив: " . implode(", ", $numbers) . "<br>";
echo "Минимальный элемент: $min<br>";
echo "Максимальный элемент: $max<br>";
echo "Сумма минимального и максимального элементов: $sum";
?>
</body>
</html>