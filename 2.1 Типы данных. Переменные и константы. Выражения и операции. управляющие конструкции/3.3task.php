<?php
$radius = rand(160, 450);
$pi = M_PI;
$area = $pi * pow($radius, 2)/100;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Круг</title>
<style>
  :root {
    --circle-radius: <?php echo $radius; ?>px;
  }

  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    position: relative;
  }

  .circle {
    width: var(--circle-radius);
    height: var(--circle-radius);
    border-radius: 50%;
    background-color: lightblue;
    position: relative;
  }

  .radius-label {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .area-label {
    position: absolute;
    top: 30;
    left:200px;
  }
</style>
</head>
<body>
  <div class="area-label">Площадь: <?php echo $area; ?></div>
  <div class="circle" id="circle">
    <div class="radius-label" id="radiusLabel">Радиус: <?php echo $radius; ?></div>
  </div>
</body>
</html>
