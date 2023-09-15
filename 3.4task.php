<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Решение квадратного уравнения</title>
</head>
<body>

<?php
$a = rand(1, 10);
$b = rand(1, 10);
$c = rand(1, 10);

echo "Уравнение: {$a}x<sup>2</sup> + {$b}x + {$c} = 0<br>";

$discriminant = $b ** 2 - 4 * $a * $c;

if ($discriminant > 0) {
    $x1 = round((-$b + sqrt($discriminant)) / (2 * $a), 2);
    $x2 = round((-$b - sqrt($discriminant)) / (2 * $a), 2);
    echo "У уравнения есть два различных корня:<br>";
    echo "x1 = $x1<br>";
    echo "x2 = $x2<br>";
} elseif ($discriminant == 0) {
    $x = -$b / (2 * $a);
    echo "У уравнения есть один корень:<br>";
    echo "x = $x<br>";
} else {
    echo "У уравнения нет действительных корней.<br>";
}
?>

</body>
</html>
