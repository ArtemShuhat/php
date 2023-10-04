<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$m = rand(2, 4);
$n = rand(3, 6);

$matrix = [];
for ($i = 0; $i < $m; $i++) {
    $row = [];
    for ($j = 0; $j < $n; $j++) {
        $row[] = rand(-10, 10);
    }
    $matrix[] = $row;
}

function isPositive($x) {
    return $x > 0;
}

$positiveNumbers = array_filter(array_merge(...$matrix), 'isPositive');
$sum = array_sum($positiveNumbers);

echo "Позитивні елементи:";
foreach ($positiveNumbers as $num) {
    echo $num . "\t";
}
echo "<br>";

echo "Сума позитивних елементів:  $sum ";
?>

</body>
</html>