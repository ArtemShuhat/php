<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

    $formattedText = wordwrap($text, 20);
    $lines = explode("\n", $formattedText);
    foreach ($lines as &$line) {
        $line = " > " . $line;
    }   
    $formattedText = implode("\n", $lines);

    echo $formattedText;    
    ?>
</body>
</html>