<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$str = '$s = "Hello"; print(($a + $b));';
$countOpen = substr_count($str, '(');
$countClose = substr_count($str, ')');

if ($countOpen === $countClose) {
    echo "Количество скобок совпадает";
} else {
    echo "Количество открывающих и закрывающих скобок не совпадает";
}

?>
</body>
</html>