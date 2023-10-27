<?php
include_once 'books.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Поиск книги</title>
</head>
<body>
    
    <form action="index.php" method="GET">
        Поиск книги: <input type="text" name="search_query">
        <input type="submit" value="Найти">
    </form>

    <form action="index.php" method="GET">
        <input type="hidden" name="show_all" value="true">

        <select name="sort">
            <option value="title">По названию</option>
            <option value="author">По автору</option>
            <option value="year">По году издания</option>
        </select><br>

        <input type="submit" value="Показать все книги">
    </form>
</body>
</html>
