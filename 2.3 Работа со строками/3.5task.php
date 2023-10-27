<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $text = "Ми будемо раді бачити Вашого сина на нашому заході. Чекаємо на нього 25 жовтня. Оргкомітет.";

    $phrases = explode(". ", $text);

    $name = "Артем";
    $phrases[0] = "Шановний $name! " . $phrases[0];

    $phrases[count($phrases) - 1] = str_replace("Оргкомітет", "Адміністрація", $phrases[count($phrases) - 1]);

    $phrases[0] = str_replace("Вашого сина", "Вашу дочку", $phrases[0]);
    $phrases[0] = str_replace("его", "її", $phrases[0]);

    $modified_text = implode("\n", $phrases);
    echo $modified_text;
    ?>
</body>
</html>