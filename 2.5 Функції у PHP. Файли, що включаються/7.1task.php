<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$a = [112, 3223, 44, 16, 2];
$result = array_map(function ($n){
    return sqrt($n);
}, $a);

print_r($result);
    ?>
</body>
</html>