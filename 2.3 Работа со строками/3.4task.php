<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $text = "                   Lorem ipsum dolor<h3> sit amet<\h3>, <p>consectetur adipiscing elit</p>, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.    ";
    $text2 = strip_tags(trim($text));
    echo $text2;
    ?>
</body>
</html>