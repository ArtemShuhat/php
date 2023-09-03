<!DOCTYPE html>
<html>
<head>
    <title>Случайная температура</title>
    <style>
        .temperature-box {
            width: 200px;
            padding: 10px;
            border: 2px solid #000;
            border-radius: 5px;
            margin: 20px auto;
            text-align: center;
        }

        .cold {
            color: blue;
        }

        .warm {
            color: red;
        }
    </style>
</head>
<body>
<?php
$random_temperature = mt_rand(-30, 40);

if ($random_temperature < 0){
    echo "<div class=\"temperature-box cold\"> $random_temperature градусов мороза </div>";
} else if ($random_temperature == 0) {
    echo "<div class=\"temperature-box\">0 градусов</div>";
} else {
    echo "<div class=\"temperature-box warm\"> $random_temperature градусов тепла </div>";
}
?>
</body>
</html>
