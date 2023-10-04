<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $arr = ["IMG_234.jpg", "images/IMG_2342.jpg", "IMG_322.png", "IMG_234542.png", "IMG_45444.gi"];
$reg_img = '/^IMG_\d+\.(jpg|png|gif)$/';

for($i = 0; $i < count($arr); $i++){
    if (preg_match($reg_img, $arr[$i], $matches)) {
        echo $arr[$i] . " - correct\n";
        print_r($matches);
    } else {
        echo $arr[$i] . " - not correct\n";
    }
}
    ?>
</body>
</html>