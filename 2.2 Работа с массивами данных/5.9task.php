<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $movies = [
    "Индиана Джонс: В поисках утраченного ковчега" => ["Спилберг", 1981],
    "Начало" => ["Нолан", 2010],
    "Бегущий по лезвию" => ["Ридли Скотт", 1982],
    "Матрица" => ["Вачовские братья", 1999],
    "Джокер" => ["Тодд Филлипс", 2019],
];

ksort($movies);

function MovieInfo($value, $key) {
    echo "<div class='movie'>";
    echo "<h4>{$key}</h4>";
    echo "<p>Режиссер: {$value[0]}</p>";
    echo "<p>Год выпуска: {$value[1]}</p>";
    echo "</div>";
}

echo "<h2>Сортировка по названию:</h2>";
array_walk($movies, 'MovieInfo');

uasort($movies, function($a, $b) {
    return strcmp($a[0], $b[0]);
});

echo "<h2>Сортировка по фамилии режиссера:</h2>";
array_walk($movies, 'MovieInfo');

uasort($movies, function($a, $b) {
    return $a[1] - $b[1];
});

echo "<h2>Сортировка по году выпуска:</h2>";
array_walk($movies, 'MovieInfo');

    ?>
</body>
</html>