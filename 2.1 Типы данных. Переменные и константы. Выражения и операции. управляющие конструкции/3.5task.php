<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
$n = rand(1, 13);

switch ($n) {
    case 1:
        echo "Учим буквы";
        break;
    case 2:
        echo "Учим таблицу умножения";
        break;
    case 3:
        echo "Занимаемся спортом";
        break;
    case 4:
        echo "Изучаем географию";
        break;
    case 5:
        echo "Уроки природоведения";
        break;
    case 6:
        echo "Геометрия и алгебра";
        break;
    case 7:
        echo "Физика и химия";
        break;
    case 8:
        echo "Изучаем историю";
        break;
    case 9:
        echo "Литература и русский язык";
        break;
    case 10:
        echo "Основы программирования";
        break;
    case 11:
        echo "Иностранные языки";
        break;
    case 12:
        echo "Почти все выучили!";
        break;
    case 13:
        echo "Готовимся к выпускным экзаменам";
        break;
    default:
        echo "Такого класса у нас нет!";
}
echo "<br>";
echo "Номер = $n";
?>
</body>
</html>