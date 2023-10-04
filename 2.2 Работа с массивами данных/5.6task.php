<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$users1 = ["John" => "qwerty", "Nicole" => "asdf", "Mark" => "ww"];
$users2 = ["Joan" => "1234", "Mark" => "poiu", "Nicole" => "ggg"];

$intersectKeys = array_intersect_key($users1, $users2);

$doubleUsers = [];
foreach ($intersectKeys as $key => $value) {
    $doubleUsers[$key] = [$value, $users2[$key]];
}

$result = $doubleUsers;

print_r($result);
?>
</body>
</html>