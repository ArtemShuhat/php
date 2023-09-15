<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$random_numbers = array();
for ($i = 0; $i < 10; $i++) {
    $random_numbers[] = rand(1, 100);
}

$sum = array_sum($random_numbers);

$count = count($random_numbers);

$average = round($sum / $count);

echo "Массив: " . implode(", ", $random_numbers) . "\n";
echo "<br>";
echo "Среднее арифметическое: $average";
?>
</body>
</html>