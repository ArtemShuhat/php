<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello, <?php echo $_GET['login'] ?>!</h1>
    <form action="index.php" method="get">
        <input type="submit" value="Go to main page">
    </form>
</body>
</html>