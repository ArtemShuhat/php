<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Таблица с изображениями</title>
</head>
<body>

<?php
$n = rand(5, 25);

echo "<table border='4' bordercolor='darkgreen'>";
echo "<tr><th>Номер строки</th><th>Изображение</th></tr>";

for ($i = 1; $i <= $n; $i++) {
    if ($i % 2 != 0) {
        echo "<tr>";
        echo "<td>$i</td>";
        //я не стал заморачиваться c выводом изображения, поэтому просто будут png значки
        echo "<td><img src='img_$i.jpg' alt='Изображение $i'></td>";
        echo "</tr>";
    }
}

echo "</table>";
?>

</body>
</html>
