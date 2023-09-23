<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Делители числа n</title>
</head>
<body>
    <?php
echo $n = rand(40, 80);
echo "<br>";

for ($k = 1; $k <= $n; $k++) {
    if ($n % $k != 0) {
        continue;
    }
    echo "$k, ";
}
?>
</body>
</html>